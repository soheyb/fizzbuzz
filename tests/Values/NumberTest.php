<?php

namespace App\Tests\Values;

use App\Controller\Values\Number;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class NumberTest extends TestCase
{

    public function test_creation_number(): void
    {
        $value = 15;

        $number = new Number($value);
        $this->assertEquals($value, $number->getValue());
    }

    public function test_creation_negative_number(): void
    {
        $value = -15;
        $this->expectException(InvalidArgumentException::class);
        $number = new Number($value);
    }
}