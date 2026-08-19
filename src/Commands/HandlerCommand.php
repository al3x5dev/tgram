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
 * Telegram Handlers command class
 */
final class HandlerCommand extends Command
{
    use Io, AskForClass, MakeClass;
    public function configure(): void
    {
        $this
            ->setName('handler')

            ->setDescription('Create a new Telegram handler')
            ->setHelp('This command allows you to create a new Telegram update handler for your bot.')
            ->addArgument('name', InputArgument::OPTIONAL, 'The name of the handler');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->prepare($input, $output);

        $name = $this->askForClassName(
            "What should Telegram's update handler be called? [e.g., ChannelPost]",
            $input->getArgument('name')
        );

        $data = $this->makeDir($name, 'bot/Handlers', $output);

        if (empty($data)) {
            $this->style->error('Handler creation failed.');
            return Command::FAILURE;
        }

        // Generar el archivo 
        $this->makeTelegramHandler($data);

        $output->writeln("<info>Handler [{$data['filename']}] created successfully.</info>");
        return Command::SUCCESS;
    }
}
