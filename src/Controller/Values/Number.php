<?php

namespace App\Controller\Values;


class Number
{
    private  $nb;

    public function __construct(int $nb)
    {
        $this->nb = $nb;
    }

    public function __toString(): string
    {
        return (string)$this->nb;
    }

    public function getValue(): int
    {
        return $this->nb;
    }
}