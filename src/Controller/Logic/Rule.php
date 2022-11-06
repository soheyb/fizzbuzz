<?php

namespace App\Controller\Logic;

use App\Controller\Values\Number;
use App\Controller\Values\Word;

/**
 * Pair of Number and Word that will set a rule
 */
class Rule implements RuleInterface
{
    private  $nb;
    private  $word;

    /**
     * @param Number $nb
     * @param Word $word
     */
    public function __construct(Number $nb, Word $word)
    {
        $this->word = $word;
        $this->nb = $nb;
    }

    /**
     * Method to compute the  multiple and return if it matchs or not
     * @param Number $input
     * @return bool
     */
    public function isMatch(Number $input): bool
    {
        $result = $input->getValue() % $this->nb->getValue() === 0;
        return ($result);
    }

    /**
     * @return string
     */
    public function getWordValue(): string
    {
        return $this->word->getValue();
    }
}