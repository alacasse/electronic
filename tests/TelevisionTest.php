<?php
declare(strict_types=1);

namespace App\Tests\Items;

use App\Electronics;

use PHPUnit\Framework\TestCase;

final class TelevisionTest extends TestCase
{
    /**
     * Not sure how to test infinity here
     */
    public function testCanAddMaxExtra()
    {
        $console = new Electronics\Items\Television();
        $this->addToAssertionCount(1);
        $console->setExtras($this->createExtras(100));
    }

    private function createExtras($count)
    {
        $extras = array();
        for ($i = 0; $i < $count; $i++) {
            $extras[] = $this->buildExtra(5 + $i);
        }

        return new Electronics\ElectronicItems($extras);
    }

    private function buildExtra($price)
    {
        $extra = new Electronics\Items\Controller();
        $extra->setPrice($price);

        return $extra;
    }

}