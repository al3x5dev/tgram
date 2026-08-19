<?php

namespace Mk4U\TGram\Commands;

use Mk4U\TGram\Bot;
use Mk4U\TGram\Commands\Traits\ConfigHandler;
use Mk4U\TGram\Commands\Traits\Io;
use Mk4U\TGram\Core\Actions\Traits\MethodsHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Hook about command class
 */
final class HookAboutCommand extends Command
{
    use Io, ConfigHandler;
    use MethodsHandler;

    public function configure(): void
    {
        $this
            ->setName('hook:about')
            ->setDescription('Gets information about the Telegram bot')
            ->setHelp(
                'This command allows you to get information about your Telegram bot, including its ID, username and other relevant details. '
                    . 'Use this command to check the configuration and status of your bot.'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->prepare($input, $output);

        //Revisar si config.php existe
        $this->runInstall();

        try {
            $data = $this->getMe();
            return $this->displayInfo($data->getProperties());
        } catch (\Throwable $th) {
            throw new \ErrorException($th->getMessage());
        }
    }
}
