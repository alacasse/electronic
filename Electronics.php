<?php

class ElectronicItems {

    private $items = array();

    public function __construct(array $items) {

        $this->items = $items;
    }

    /**
     * Returns the items depending on the sorting type requested
     *
     * @return array
     */
    public function getSortedItems($type) {

        $sorted = array();
        foreach ( $this->items as $item ) {

            $sorted[($item->price * 100)] = $item;
        }

        ksort($sorted, SORT_NUMERIC);

        return $sorted;
    }

    /**
     *
     * @param string $type
     * @return array
     */
    public function getItemsByType( $type ) {

        if (in_array($type, ElectronicItem::$types) ) {

            $callback = function ($item) use ($type) {
                return $item->getType() == $type;
            };

            return array_filter($this->items, $callback);
        }

        return false;
    }
}

class ElectronicItem {

    /**
     * @var float
     */
    public $price;

    /**
     * @var string
     */
    private $type;
    public $wired;

    const ELECTRONIC_ITEM_TELEVISION = 'television';
    const ELECTRONIC_ITEM_CONSOLE = 'console';
    const ELECTRONIC_ITEM_MICROWAVE = 'microwave';

    public static $types = array(
        self::ELECTRONIC_ITEM_CONSOLE,
        self::ELECTRONIC_ITEM_MICROWAVE,
        self::ELECTRONIC_ITEM_TELEVISION
    );

    function getPrice() {
        return $this->price;
    }

    function getType() {
        return $this->type;
    }

    function getWired() {
        return $this->wired;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setWired($wired) {
        $this->wired = $wired;
    }
}