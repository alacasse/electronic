<?php

namespace App\Electronics\Items;

use App\Electronics as Electronics;

class Console extends Electronics\ElectronicItem
{
    const MAX_EXTRAS = 4;

    /**
     * @var Electronics\ElectronicItems
     */
    private $extras;

    public function __construct()
    {
        $this->setType(parent::ELECTRONIC_ITEM_CONSOLE);
    }

    private function maxExtras()
    {
        return $this::MAX_EXTRAS;
    }

    public function setExtras(Electronics\ElectronicItems $extras)
    {
        if (count($extras->getSortedItems('')) > $this->maxExtras()) {
            throw new \Exception("The amount of controllers is greater than {$this->maxExtras()}");
        }

        $this->extras = $extras;
    }

    public function getTotalPrice()
    {
        $totalPrice = $this->getPrice();
        foreach ($this->extras->getSortedItems('') as $extra) {
            $totalPrice += $extra->getPrice();
        }

        return $totalPrice;
    }

}