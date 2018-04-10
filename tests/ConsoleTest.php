<?php
declare(strict_types=1);

namespace App\Tests\Items;

use App\Electronics;

use PHPUnit\Framework\TestCase;

final class ConsoleTest extends TestCase
{
    public function testCanAddMaxExtra()
    {
        $console = new Electronics\Items\Console();
        $this->addToAssertionCount(1);
        $console->setExtras($this->createExtras(4));
    }

    public function testMaxExtras(): void
    {
        $console = new Electronics\Items\Console();
        $this->expectException(\Exception::class);
        $console->setExtras($this->createExtras(5));
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