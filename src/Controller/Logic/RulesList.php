<?php

namespace App\Controller\Logic;

use App\Controller\Logic\Rule;

class RulesList
{
    private  $rules;

    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    public function push(Rule $rule): RulesList
    {
        $this->rules[] = $rule;
        return new self($this->rules);
    }


    public function getValues(): array
    {
        return $this->rules;
    }


}