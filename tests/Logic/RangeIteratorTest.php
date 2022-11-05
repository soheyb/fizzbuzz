<?php

namespace App\Tests\Logic;
use App\Controller\Logic\RangeIterator;
use App\Controller\Values\Number;


use PHPUnit\Framework\TestCase;

class RangeIteratorTest extends TestCase
{

    public function test_1_10_iteration(): void
    {
        $start = 1;
        $end = 10;

        $nb1 = new Number($start);
        $nb2 = new Number($end);
        $iterator = new RangeIterator($nb1, $nb2);
        $this->assertEquals($iterator->getStart(), $nb1);
        $this->assertEquals($iterator->getEnd(), $nb2);
    }

}