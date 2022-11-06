<?php

namespace App\Tests\Values;

use App\Controller\Values\Word;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class WordTest extends TestCase
{

    /**
     * Test creation of a Word
     * @return void
     */
    public function test_creation_word(): void
    {
        $value = "fizz";

        $word = new Word($value);
        $this->assertEquals($value, $word->getValue());
    }

    /**
     * Test creation of an empty Word
     * @return void
     */
    public function test_creation_empty_word(): void
    {
        $value = "";
        $this->expectException(InvalidArgumentException::class);
        $word = new Word($value);
    }

}