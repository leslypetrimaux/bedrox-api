<?php

namespace App\Cli\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CustomExample extends Command
{
    protected function configure()
    {
        $this
            ->setName('bedrox:custom-example')
            ->setDescription('Custom command example')
            ->setHelp('Example to show how command must be implemented')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(array(
            '==================================================',
            'Custom Example: this is just a custom test command',
            '=================================================='
        ));
        // TODO: handle command process
    }
}
