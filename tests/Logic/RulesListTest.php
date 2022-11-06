<?php

namespace App\Tests\Logic;


use App\Controller\Logic\Rule;
use App\Controller\Logic\RulesList;
use App\Controller\Values\Number;
use App\Controller\Values\Word;
use PHPUnit\Framework\TestCase;

class RulesListTest extends TestCase
{

    /**
     * Test creation of RulesList
     * @return void
     */
    public function test_rules_list():void
    {

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
        $this->assertIsArray($rules->getValues());
        $values = $rules->getValues();
        $this->assertInstanceOf(Rule::class,$values[0]);
    }


    /**
     * Test push a new Rule to RulesList
     * @return void
     */
    public function test_add_rule():void
    {

        $fizz = new Word("fizz");
        $buzz = new Word("buzz");
        $buzz2 = new Word("buzz2");
        $nb1 = new Number(3);
        $nb2 = new Number(4);
        $nb3 = new Number(5);
        $rule1 = new Rule($nb1, $fizz);
        $rule2 = new Rule($nb2, $buzz);
        $rule3 = new Rule($nb3, $buzz2);
        $rules =new RulesList([
            $rule1,
            $rule2
        ]);

        $rules->push($rule3);
        $this->assertIsArray($rules->getValues());
        $values = $rules->getValues();
        $this->assertInstanceOf(Rule::class,$values[2]);
    }

}