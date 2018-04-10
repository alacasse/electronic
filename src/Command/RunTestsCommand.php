<?php

namespace App\Command;


use PHPUnit\TextUI\TestRunner;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RunTestsCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:run-tests')
            ->setDescription('Run the phpunit tests')
            ->setHelp('This command will run the phpunit tests')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $phpunit = new TestRunner();
        $phpunit->dorun($phpunit->getTest(TESTS_PATH, '', 'Test.php'));
    }
}
