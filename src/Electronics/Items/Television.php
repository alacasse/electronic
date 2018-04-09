<?php

namespace App\Electronics\Items;

use App\Electronics as Electronics;

class Television extends Electronics\ElectronicItem
{
    const MAX_EXTRAS = -1;

    /**
     * @var Electronics\ElectronicItems
     */
    private $extras;

    public function __construct()
    {
        $this->setType(parent::ELECTRONIC_ITEM_TELEVISION);
    }

    private function maxExtras()
    {
        return $this::MAX_EXTRAS;
    }

    public function setExtras(Electronics\ElectronicItems $extras)
    {
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