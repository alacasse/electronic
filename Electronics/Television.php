<?php
/**
 * Created by PhpStorm.
 * User: André Lacasse
 * Date: 2018-03-30
 * Time: 3:52 PM
 */

class Television extends ElectronicItem
{
    /**
     * @var ElectronicItems
     */
    private $extras;

    /**
     * Television constructor.
     */
    public function __construct() {
        $this->setType(parent::ELECTRONIC_ITEM_TELEVISION);
    }

    private function maxExtras() {
        return -1;
    }

    public function setExtras(ElectronicItems $extras) {
        $this->extras = $extras;
    }

    public function getTotalPrice() {
        $totalPrice = $this->getPrice();
        foreach ($this->extras->getSortedItems('') as $extra) {
            $totalPrice += $extra->getPrice();
        }

        return $totalPrice;
    }
}