<?php

namespace App\Tests\Logic;


use App\Controller\Logic\Rule;
use App\Controller\Values\Number;
use App\Controller\Values\Word;
use PHPUnit\Framework\TestCase;

class RuleTest extends TestCase
{

    /**
     * @return void
     */
    public function test_world_value(): void
    {
        $nb = new Number(3);
        $word = new Word("fizz");

        $rule = new Rule($nb, $word);
        $this->assertEquals($word->getValue(), $rule->getWordValue());
    }


    /**
     * @return void
     */
    public function test_basic_match(): void
    {
        $nb = new Number(3);
        $word = new Word("fizz");
        $input= new Number(9);

        $rule = new Rule($nb, $word);
        $this->assertEquals(true, $rule->isMatch($input));
    }

    /**
     * @return void
     */
    public function test_basic_wrong_match(): void
    {
        $nb = new Number(3);
        $word = new Word("fizz");
        $input= new Number(8);

        $rule = new Rule($nb, $word);
        $this->assertEquals(false, $rule->isMatch($input));
    }

}