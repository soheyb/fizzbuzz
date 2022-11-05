<?php

namespace App\Controller\Logic;

use App\Controller\Values\Number;
use App\Controller\Values\Word;

class Rule implements RuleInterface
{
    private  $nb;
    private  $word;

    public function __construct(Number $nb, Word $word)
    {
        $this->word = $word;
        $this->nb = $nb;
    }

    public function isMatch(Number $input): bool
    {
        $result = $input->getValue() % $this->nb->getValue() === 0;
        return ($result);
    }

    public function getWordValue(): string
    {
        return $this->word->getValue();
    }
}