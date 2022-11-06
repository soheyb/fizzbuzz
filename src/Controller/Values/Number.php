<?php

namespace App\Controller\Values;


use InvalidArgumentException;

/**
 *
 */
class Number
{
    private  $nb;

    /**
     * @param int $nb
     */
    public function __construct(int $nb)
    {
      $this->_setNb($nb);
    }

    /**
     * @param $nb
     * @return void
     */
    protected function _setNb($nb)
    {
        if ($nb > 0) {
            $this->nb = $nb;

        }
        else
        {
            throw new InvalidArgumentException(
                'Number can only be positive'
            );
        }

    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->nb;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->nb;
    }
}