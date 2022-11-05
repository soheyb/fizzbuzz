<?php

namespace App\Controller\Values;

class Word
{
    private  $word;

    public function __construct(string $word)
    {
        $this->word = $word;
    }

    public function getValue(): string
    {
        return $this->word;
    }
}