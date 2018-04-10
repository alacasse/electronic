<?php

namespace App\Electronics\Items;

use App\Electronics as Electronics;

class Console extends Electronics\ElectronicItem
{
    use SetExtrasTrait;

    const MAX_EXTRAS = 4;

    public function __construct()
    {
        $this->setType(parent::ELECTRONIC_ITEM_CONSOLE);
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
