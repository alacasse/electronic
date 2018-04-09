<?php

namespace App\Command;

use App\Electronics\ElectronicItem;
use App\Scenario\ScenarioBuilder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConsolePriceCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:console-price')
            ->setDescription('Get the price of the console and of its controllers')
            ->setHelp('This command allows you to get the price of the console and of its controllers')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $scenarioBuilder = new ScenarioBuilder(CONF_PATH . 'scenario1.yaml');
        $electronicItems = $scenarioBuilder->build();

        $console = $electronicItems->getItemsByType(ElectronicItem::ELECTRONIC_ITEM_CONSOLE);
        print "Total price of the console with its controllers: {$console[0]->getTotalPrice()} \n";
    }
}
