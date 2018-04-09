<?php

namespace App\Electronics\Items;

use App\Electronics as Electronics;

class Controller extends Electronics\ElectronicItem
{
    const MAX_EXTRAS = 0;

    public function __construct()
    {
        $this->setType('Controller');
    }

    public function maxExtras()
    {
        return $this::MAX_EXTRAS;
    }

    public function getTotalPrice()
    {
        return $this->getPrice();
    }

}