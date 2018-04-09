<?php

namespace App\Scenario;

use App\Electronics\ElectronicItems;
use App\Electronics\Items\Console;
use App\Electronics\Items\Controller;
use App\Electronics\Items\Microwave;
use App\Electronics\Items\Television;
use Symfony\Component\Yaml\Yaml;

class ScenarioBuilder
{
    private $yamlFilePath;

    public function __construct($yamlFilePath)
    {
        $this->yamlFilePath = $yamlFilePath;
    }

    public function build()
    {
        $scenarioConfig = Yaml::parseFile($this->yamlFilePath);
        $electronicItems = array();

        foreach ($scenarioConfig as $name => $electronicItemConfigs) {
            $electronicItems[] = $this->buildElectronicItem($electronicItemConfigs);
        }

        return new ElectronicItems($electronicItems);
    }

    private function buildElectronicItem(array $electronicItemConfigs)
    {
        $electronicItem = $this->getElectronicItemFromType($electronicItemConfigs['type']);
        $electronicItem->setPrice($electronicItemConfigs['price']);

        $extras = array();

        if (is_array($electronicItemConfigs['extras'])) {
            foreach ($electronicItemConfigs['extras'] as $extrasConfigs) {
                $extras[] = $this->buildExtraFromConfig($extrasConfigs);

            }
        }

        if (count($extras) > 0) {
            $electronicItem->setExtras(new ElectronicItems($extras));
        }


        return $electronicItem;
    }

    private function getElectronicItemFromType($type)
    {
        $electronicItem = null;
        switch ($type){
            case 'console':
                $electronicItem = new Console();
                break;
            case 'television':
                $electronicItem = new Television();
                break;
            case 'microwave':
                $electronicItem = new Microwave();
                break;
            default:
                throw new \Exception('Unknown electricItem type');
                break;
        }

        return $electronicItem;
    }

    private function buildExtraFromConfig($configs)
    {
        $extra = $this->getExtraFromType($configs['type']);
        $extra->setPrice($configs['price']);
        $extra->setWired($configs['wired']);

        return $extra;
    }

    private function getExtraFromType($type)
    {
        if ($type == 'controller') {
            return new Controller();
        } else {
            throw new \Exception('Unknown extra type');
        }
    }

}