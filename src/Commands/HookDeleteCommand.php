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
 * Hook delete command class
 */
final class HookDeleteCommand extends Command
{
    use Io, ConfigHandler;
    use MethodsHandler;

    public function configure(): void
    {
        $this
            ->setName('hook:delete')
            ->setDescription('Delete the webhook for the Telegram bot.')
            ->setHelp(
                'This command allows you to delete the webhook URL for your Telegram bot. '
                    . 'Once the webhook is deleted, your bot will no longer receive updates from Telegram. '
                    . 'You can use this command when you want to stop receiving updates or when you want to set a new webhook.'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->prepare($input, $output);

        //Revisar si config.php existe
        $this->runInstall();

        $data = $this->deleteWebhook(drop_pending_updates:true);
        try {
            if (!$data) {
                throw new \Exception("Error: the webhook was not removed.");
                
            }
            $this->style->success('Webhook was deleted');
            return Command::SUCCESS;
        } catch (\Throwable $th) {
            throw new \ErrorException($th->getMessage());
        }
    }
}
