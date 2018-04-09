#!/usr/bin/env php
<?php
/**
 * App created by André Lacasse
 * alacasse@gmail.com
 */

define("APP_PATH", __DIR__);
define("CONF_PATH", __DIR__ . '/config/');

$loader = require __DIR__ . '/vendor/autoload.php';
$loader->addPsr4('App\\', __DIR__ . '/src/');

use Symfony\Component\Console\Application;

$application = new Application();

$application->addCommands(array(
    new App\Command\SortItemsCommand(),
    new App\Command\ConsolePriceCommand()
));

$application->run();