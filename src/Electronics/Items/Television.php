<?php

namespace App\Electronics\Items;

use App\Electronics as Electronics;

class Television extends Electronics\ElectronicItem
{
    use SetExtrasTrait;

    /**
     * No maximum
     */
    const MAX_EXTRAS = -1;

    public function __construct()
    {
        $this->setType(parent::ELECTRONIC_ITEM_TELEVISION);
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
