<?php

namespace App\Controller\Logic;

use App\Controller\Values\Number;

interface RuleInterface
{
    public function isMatch(Number $input) : bool;
    public function getWordValue() : string;
}