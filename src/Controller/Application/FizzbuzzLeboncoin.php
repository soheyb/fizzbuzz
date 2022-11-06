<?php

namespace App\Controller\Application;

use App\Controller\Logic\FizzbuzzInterface;
use App\Controller\Logic\IteratorInterface;
use App\Controller\Logic\RuleInterface;
use App\Controller\Logic\RulesList;
use App\Controller\Values\Number;

/**
 * Handle custom Feezbuzz application for the Leboncoin
 */
class FizzbuzzLeboncoin implements FizzbuzzInterface
{

    private  $range;
    private  $rules;

    /**
     * @param IteratorInterface $range
     * @param RulesList $rules
     */
    public function __construct(IteratorInterface $range, RulesList $rules)
    {
        $this->range = $range;
        $this->rules = $rules;
    }

    /**
     * @param RuleInterface $rule
     * @return void
     */
    public function addRule(RuleInterface $rule): void
    {
        $this->rules->push($rule);
    }

    /**
     * Method used to replace the number by the associated word
     *
     * @param Number $nb
     * @return string
     */
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

    /**
     * Method to run the iteration
     *
     * @return string
     */
    public function generate(): string
    {
        return $this->range->run([$this, "getReplacement"], "");
    }
}