<?php

namespace App\Tests\Entity;

use App\Entity\Statistics;
use PHPUnit\Framework\TestCase;

class StatisticsTest extends TestCase
{
    /**
     * Test create statistic data
     * @return void
     */
    public function test_statistic_creation(): void
    {
        $request = "?int1=3&int2=4&word1=fizz&word2=buzz&limit=10";
        $statistics = New Statistics($request);
        $this->assertEquals($request, $statistics->getRequest());

    }
}