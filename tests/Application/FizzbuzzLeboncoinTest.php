<?php

namespace App\Tests\Application;


use App\Controller\Application\FizzbuzzLeboncoin;
use App\Controller\Logic\RangeIterator;
use App\Controller\Logic\Rule;
use App\Controller\Logic\RulesList;
use App\Controller\Values\Number;
use App\Controller\Values\Word;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class FizzbuzzLeboncoinTest extends TestCase
{

    /** Test simple application logic
     * @return void
     */
    public function test_fizzbuzz_leboncoin():void
    {

        $start=new Number(1);
        $end= new Number(10);
        $fizz = new Word("fizz");
        $buzz = new Word("buzz");
        $nb1 = new Number(3);
        $nb2 = new Number(4);
        $rule1 = new Rule($nb1, $fizz);
        $rule2 = new Rule($nb2, $buzz);
        $rules =new RulesList([
            $rule1,
            $rule2
        ]);
        $iterator = new RangeIterator($start, $end);
        $fizzBuzz =new FizzbuzzLeboncoin($iterator, $rules);
        $generatedString = $fizzBuzz->generate();
        $this->assertEquals("12fizzbuzz5fizz7buzzfizz", $generatedString);

    }

    /**
     * Test calling the methods injecting the wrong classes
     * @return void
     */
    public function test_fizzbuzz_leboncoin_wrong_class():void
    {
        $this->expectException(InvalidArgumentException::class);
        $start=new Number(1);
        $end= new Number(10);
        $fizz = new Word("");
        $buzz = new Word("buzz");
        $nb1 = new Number(3);
        $nb2 = new Number(4);
        $rule1 = new Rule($nb1, $fizz);
        $rule2 = new Rule($nb2, $buzz);
        $rules =new RulesList([
            $rule1,
            $rule2
        ]);
        $fizzBuzz =new FizzbuzzLeboncoin($nb1, $start);

    }
}