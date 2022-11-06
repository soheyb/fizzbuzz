<?php

namespace App\Tests\Logic;
use App\Controller\Logic\RangeIterator;
use App\Controller\Values\Number;


use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class RangeIteratorTest extends TestCase
{

    /**
     * Test iteration from 1 to 10
     * @return void
     */
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

    /**
     * test iteration from 1 to 200
     * @return void
     */
    public function test_1_200_iteration(): void
    {
        $start = 1;
        $end = 200;

        $nb1 = new Number($start);
        $nb2 = new Number($end);
        $iterator = new RangeIterator($nb1, $nb2);
        $this->assertEquals($iterator->getStart(), $nb1);
        $this->assertEquals($iterator->getEnd(), $nb2);
    }

    /**
     * test iteration from 1 to 500
     * @return void
     */
    public function test_1_500_iteration(): void
    {
        $start = 1;
        $end = 500;

        $nb1 = new Number($start);
        $nb2 = new Number($end);
        $this->expectException(InvalidArgumentException::class);
        $iterator = new RangeIterator($nb1, $nb2);
    }

}