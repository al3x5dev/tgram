<?php

namespace Mk4U\TGram\Commands;

use Mk4U\TGram\Bot;
use Mk4U\TGram\Commands\Traits\Io;
use Mk4U\TGram\Core\Entities\Update;
use Mk4U\TGram\Exceptions\BotException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Poll command class
 */
final class PollCommand extends Command
{
    use Io;

    public function configure(): void
    {
        $this
            ->setName('poll')
            ->setDescription('Starts the bot using long polling instead of a webhook.')
            ->setHelp(
                'This command starts a long-running process that fetches updates '
                    . 'from Telegram using long polling and processes them through '
                    . 'the bot pipeline. You can pass the polling interval (in seconds) '
                    . 'as an optional argument, it defaults to 3.'
            )
            ->addArgument(
                'interval',
                InputArgument::OPTIONAL,
                'Polling interval in seconds [default: 3].',
                3
            );
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->prepare($input, $output);

        // Elimina el webhook
        $this->getApplication()->find('hook:delete')->run($input, new NullOutput);


        //Leer y validar el intervalo
        $interval = $input->getArgument('interval') ?? 3;
        if (
            !is_numeric($interval)
            || (int)$interval < 0
            || (int)$interval != (float)$interval
        ) {
            throw new \InvalidArgumentException(
                "The interval must be a positive integer (seconds), got " . var_export($interval, true) . "."
            );
        }
        $interval = (int)$interval;

        $this->handleSignals();

        $bot   = new Bot();
        $offset = 0;

        $this->output->writeln(sprintf(
            '<info>Polling started</info> (interval: <comment>%ds</comment>). Press <comment>Ctrl+C</comment> to stop.',
            $interval
        ));

        while (true) {
            //Obtener las actualizaciones
            try {
                $updates = $bot->getUpdates($offset, timeout: $interval);
            } catch (\Throwable $th) {

                $wait = ($th instanceof BotException && $th->retryAfter > 0)
                    ? $th->retryAfter
                    : max(1, $interval);

                //Error al consultar Telegram: no detiene el flujo, se reintenta
                $this->output->writeln(sprintf(
                    '<error>WARNING:</error> API error: %s — retrying in %ds...',
                    $th->getMessage(),
                    $wait
                ));
                sleep($wait);
                continue;
            }

            //Procesar cada actualizacion
            foreach ($updates as $raw) {
                $id   = $raw['update_id'] ?? '?';
                $type = null;

                try {
                    $update = new Update($raw);
                    $type   = $update->type();

                    $bot->run($update);

                    $this->output->writeln(sprintf(
                        '<info>update_id: %s, type: %s</info>',
                        $id,
                        $type ?? 'unknown'
                    ));

                    //Confirmar la actualizacion para no recibirla de nuevo
                    $offset = (is_int($id) ? $id : (int)$id) + 1;
                } catch (\Throwable $th) {
                    //Error al procesar la actualizacion: se muestra advertencia y se continua
                    $this->output->writeln(sprintf(
                        '<error>ERROR:</error> update_id: %s, type: %s — %s',
                        $id,
                        $type ?? 'unknown',
                        $th->getMessage()
                    ));
                }
            }

            //Con intervalo 0 Telegram responde al instante: evitar bucle ocupado
            if ($interval === 0 && empty($updates)) {
                sleep(1);
            }
        }
    }

    /**
     * Instala manejadores de señales para un apagado limpio (Ctrl+C)
     */
    private function handleSignals(): void
    {
        if (!function_exists('pcntl_async_signals')) {
            return;
        }

        pcntl_async_signals(true);

        $stop = function (): never {
            $this->output->writeln('');
            $this->output->writeln('<comment>Polling stopped.</comment>');
            exit(0);
        };

        pcntl_signal(SIGINT, $stop);
        pcntl_signal(SIGTERM, $stop);
    }
}
