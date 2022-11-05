<?php

namespace App\Controller\Application;

use App\Controller\Logic\FizzbuzzInterface;
use App\Controller\Logic\IteratorInterface;
use App\Controller\Logic\RuleInterface;
use App\Controller\Logic\RulesList;
use App\Controller\Values\Number;

class FizzbuzzLeboncoin implements FizzbuzzInterface
{

    private  $range;
    private  $rules;


    public function __construct(IteratorInterface $range, RulesList $rules)
    {
        $this->range = $range;
        $this->rules = $rules;
    }

    public function addRule(RuleInterface $rule): void
    {
        $this->rules->push($rule);
    }

    public function getReplacement(Number $nb): string
    {
        $res = "";
        foreach($this->rules->getValues() as $rule) {
            if ($rule->isMatch($nb)) {
                $res .= $rule->getWordValue($nb);
            }
        }
        return ($res ?: $nb->__toString());
    }

    public function generate(): string
    {
        return $this->range->run([$this, "getReplacement"], "");
    }
}