<?php

namespace App\Electronics;

class ElectronicItems
{

    private $items = array();

    public function __construct(array $items)
    {

        $this->items = $items;
    }

    /**
     * Returns the items depending on the sorting type requested
     *
     * @return array
     */
    public function getSortedItems($type)
    {

        $sorted = array();
        foreach ($this->items as $item) {

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
    public function getItemsByType($type)
    {

        if (in_array($type, ElectronicItem::$types)) {

            $callback = function ($item) use ($type) {
                return $item->getType() == $type;
            };

            return array_filter($this->items, $callback);
        }

        return false;
    }
}
