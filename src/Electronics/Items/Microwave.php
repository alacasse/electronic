<?php

namespace App\Electronics\Items;

use App\Electronics as Electronics;

class Microwave extends Electronics\ElectronicItem
{
    const MAX_EXTRAS = 0;

    public function __construct()
    {
        $this->setType(parent::ELECTRONIC_ITEM_MICROWAVE);
    }

    private function maxExtras()
    {
        return $this::MAX_EXTRAS;
    }

    public function getTotalPrice()
    {
        return $this->getPrice();
    }

}