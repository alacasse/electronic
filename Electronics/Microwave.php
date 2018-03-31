<?php
/**
 * Created by PhpStorm.
 * User: André Lacasse
 * Date: 2018-03-30
 * Time: 3:53 PM
 */

class Microwave extends ElectronicItem
{
    /**
     * Microwave constructor.
     */
    public function __construct() {
        $this->setType(parent::ELECTRONIC_ITEM_MICROWAVE);
    }

    private function maxExtras() {
        return 0;
    }

    public function getTotalPrice() {
        return $this->getPrice();
    }
}