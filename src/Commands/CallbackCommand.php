<?php

namespace Mk4U\TGram\Commands;

use Mk4U\TGram\Commands\Traits\AskForClass;
use Mk4U\TGram\Commands\Traits\Io;
use Mk4U\TGram\Commands\Traits\MakeClass;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Telegram Callbacks command class
 */
final class CallbackCommand extends Command
{
    use Io, AskForClass, MakeClass;
    public function configure(): void
    {
        $this
            ->setName('callback')
            ->setDescription('Create a new Telegram callback')
            ->setHelp('This command allows you to create a new Telegram callback for your bot');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {

        $this->prepare($input, $output);

        $name = $this->askForClassName(
            'Callback class name (supports subdirs: Games/Dice)',
            null
        );

        $action = $this->askForClassName(
            'Callback action name (e.g. play, join, confirm)',
            null
        );

        $data = $this->makeDir($name, 'bot/Callbacks', $output);

        if (empty($data)) {
            $this->style->error('Callback creation failed.');
            return Command::FAILURE;
        }

        $this->makeCallback($data, $action);
        $output->writeln("<info>Telegram callback [{$data['filename']}] created successfully.</info>");
        return Command::SUCCESS;
    }
}
