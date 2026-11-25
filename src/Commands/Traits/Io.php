<?php

namespace Mk4U\TGram\Commands\Traits;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

trait Io
{
    protected SymfonyStyle $style;

    protected InputInterface $input;
    protected OutputInterface $output;

    /**
     * Instancia SymfonyStyle y optiene InputInterface, OutputInterface
     */
    protected function prepare(InputInterface $input, OutputInterface $output): void
    {
        $this->input = $input;
        $this->output = $output;
        $this->style = new SymfonyStyle($input, $output);
    }

    /**
     * Limpia la pantalla
     */
    protected function clear(): void
    {
        $this->output->write("\033[2J\033[;H");
    }

    /**
     * Muestra en pantalla los datos pasados en un array
     * 
     * Este metodo es muy util con los datos devueltos por hook:info y hook:about
     */
    protected function displayInfo(array $data, int $level = 0): int
    {
        $indent = str_repeat('  ', $level);

        foreach ($data as $key => $value) {
            // Listas como active_usernames se muestran elemento por elemento
            if (is_array($value)) {
                $this->output->writeln($indent . "<info>$key</info>:" . (empty($value) ? ' []' : ''));
                $this->displayInfo($value, $level + 1);
                continue;
            }

            if (is_bool($value)) {
                $value = $value ? 'true' : 'false';
            } elseif (is_null($value)) {
                $value = 'null';
            }

            $this->output->writeln($indent . "<info>$key</info>: " . $value);
        }

        return Command::SUCCESS;
    }
}
