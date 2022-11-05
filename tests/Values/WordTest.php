<?php

namespace App\Tests\Values;

use App\Controller\Values\Word;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class WordTest extends TestCase
{

    public function test_creation_word(): void
    {
        $value = "fizz";

        $word = new Word($value);
        $this->assertEquals($value, $word->getValue());
    }

    public function test_creation_empty_word(): void
    {
        $value = "";
        $this->expectException(InvalidArgumentException::class);
        $word = new Word($value);
    }

}