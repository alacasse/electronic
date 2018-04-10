<?php
declare(strict_types=1);

namespace App\Tests\Items;

use App\Electronics;

use PHPUnit\Framework\TestCase;

final class MicrowaveTest extends TestCase
{

    public function testMaxExtras(): void
    {
        $console = new Electronics\Items\Microwave();
        $this->expectException(\Exception::class);
        $console->setExtras($this->createExtras(1));
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