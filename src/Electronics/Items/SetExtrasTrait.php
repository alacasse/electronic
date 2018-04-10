<?php

namespace App\Electronics\Items;

use App\Electronics as Electronics;

trait SetExtrasTrait
{
    /**
     * @var Electronics\ElectronicItems
     */
    private $extras;

    private function getMaxExtras()
    {
        return $this::MAX_EXTRAS;
    }

    public function setExtras(Electronics\ElectronicItems $extras)
    {
        if ($this->getMaxExtras() >= 0 && count($extras->getSortedItems('')) > $this->getMaxExtras()) {
            throw new \Exception("The amount of controllers is greater than {$this->getMaxExtras()}");
        }

        $this->extras = $extras;
    }
}
