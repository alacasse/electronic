<?php
/**
 * Created by PhpStorm.
 * User: André Lacasse
 * Date: 2018-03-30
 * Time: 1:20 PM
 */
require_once "Electronics.php";
require_once "Electronics/Television.php";
require_once "Electronics/Microwave.php";
require_once "Electronics/Controller.php";
require_once "Electronics/Console.php";

$electronicItems = new ElectronicItems(array(
    buildConsole(),
    buildTelevision1(),
    buildTelevision2(),
    buildMicrowave()
));

$totalPrice = 0;
$sortedElectronicItems = $electronicItems->getSortedItems('');
print "Ordered list of the electronic items, including extras: \n";
foreach ($sortedElectronicItems as $electronicItem) {
    $itemTotalPrice = $electronicItem->getTotalPrice();
    $totalPrice += $itemTotalPrice;
    print "{$electronicItem->getType()}: {$itemTotalPrice}\n";
}
print "Total price: $totalPrice \n";

$console = $electronicItems->getItemsByType(ElectronicItem::ELECTRONIC_ITEM_CONSOLE);
print "\nTotal price of console with its controllers: {$console[0]->getTotalPrice()} \n";


function buildConsole() {
    $console = new Console();
    $console->setPrice(500);

    $wiredController1 = new Controller();
    $wiredController1->setWired(true);
    $wiredController1->setPrice(20);
    $wiredController2 = new Controller();
    $wiredController2->setWired(true);
    $wiredController2->setPrice(25);

    $remoteController1 = new Controller();
    $remoteController1->setWired(false);
    $remoteController1->setPrice(40);
    $remoteController2 = new Controller();
    $remoteController2->setWired(false);
    $remoteController2->setPrice(45);

    $console->setExtras(
        new ElectronicItems(array (
                $wiredController1,
                $wiredController2,
                $remoteController1,
                $remoteController2
            )
        ));

    return $console;
}

function buildTelevision1() {
    $television = new Television();
    $television->setPrice(1000);

    $remoteController1 = new Controller();
    $remoteController1->setWired(false);
    $remoteController1->setPrice(10);
    $remoteController2 = new Controller();
    $remoteController2->setWired(false);
    $remoteController2->setPrice(15);

    $television->setExtras(
        new ElectronicItems(array (
                $remoteController1,
                $remoteController2,
            )
        ));

    return $television;
}

function buildTelevision2() {
    $television = new Television();
    $television->setPrice(1200);

    $remoteController = new Controller();
    $remoteController->setWired(false);
    $remoteController->setPrice(15);

    $television->setExtras(
        new ElectronicItems(array (
                $remoteController
            )
        ));

    return $television;
}

function buildMicrowave(){
    $microwave = new Microwave();
    $microwave->setPrice(220);

    return $microwave;
}
