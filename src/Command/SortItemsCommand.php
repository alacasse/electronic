<?php

namespace App\Command;

use App\Scenario\ScenarioBuilder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SortItemsCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:sort-items')
            ->setDescription('Sort the items by price and output the total pricing')
            ->setHelp('This command allows you to sort the items by price and output the total pricing')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $scenarioBuilder = new ScenarioBuilder(CONF_PATH . 'scenario1.yaml');
        $electronicItems = $scenarioBuilder->build();

        $totalPrice = 0;
        $sortedElectronicItems = $electronicItems->getSortedItems('');
        print "Ordered list of the electronic items, including extras: \n";
        foreach ($sortedElectronicItems as $electronicItem) {
            $itemTotalPrice = $electronicItem->getTotalPrice();
            $totalPrice += $itemTotalPrice;
            print "{$electronicItem->getType()}: {$itemTotalPrice}\n";
        }
        print "Total price: $totalPrice \n";
    }
}
