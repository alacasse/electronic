#!/usr/bin/env php
<?php
/**
 * App created by André Lacasse
 * alacasse@gmail.com
 */

require_once "bootstrap.php";

use Symfony\Component\Console\Application;

$application = new Application();

$application->addCommands(array(
    new App\Command\SortItemsCommand(),
    new App\Command\ConsolePriceCommand(),
    new App\Command\RunTestsCommand()
));

$application->run();
