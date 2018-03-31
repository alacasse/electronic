<?php
/**
 * Created by PhpStorm.
 * User: André Lacasse
 * Date: 2018-03-30
 * Time: 3:53 PM
 */

class Controller extends ElectronicItem
{
    /**
     * Microwave constructor.
     */
    public function __construct() {
        $this->setType('Controller');
    }

    public function maxExtras() {
        return 0;
    }

    public function getTotalPrice() {
        return $this->getPrice();
    }

}