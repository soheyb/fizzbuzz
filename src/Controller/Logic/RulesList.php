<?php

namespace App\Controller\Logic;

use App\Controller\Logic\RuleInterface;

/**
 * Handle a collection of rules
 */
class RulesList
{
    private  $rules;

    /**
     * @param array $rules
     */
    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * Method to add a Rule to the collection
     * @param \App\Controller\Logic\RuleInterface $rule
     * @return RulesList
     */
    public function push(RuleInterface $rule): RulesList
    {
        $this->rules[] = $rule;
        return new self($this->rules);
    }

    /**
     * @return array
     */
    public function getValues(): array
    {
        return $this->rules;
    }


}