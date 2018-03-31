<?php
/**
 * Created by PhpStorm.
 * User: André Lacasse
 * Date: 2018-03-30
 * Time: 3:52 PM
 */

class Console extends ElectronicItem
{
    /**
     * @var ElectronicItems
     */
    private $extras;

    /**
     * Console constructor.
     */
    public function __construct() {
        $this->setType(parent::ELECTRONIC_ITEM_CONSOLE);
    }

    private function maxExtras() {
        return 4;
    }

    public function setExtras(ElectronicItems $extras) {
        if (count($extras->getSortedItems('')) > $this->maxExtras()) {
            throw new Exception("The amount of controllers is greater than {$this->maxExtras()}");
        }

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