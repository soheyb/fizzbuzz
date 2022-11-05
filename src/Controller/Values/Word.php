<?php

namespace App\Controller\Values;

use InvalidArgumentException;

class Word
{
    private  $word;

    /**
     * @param string $word
     */
    public function __construct(string $word)
    {
        $this->_setWord($word);
    }

    /**
     * @param $word
     * @return void
     */
    protected function _setWord($word)
    {
        if (!empty($word) || is_null($word)) {
            $this->word = $word;
        }
        else
        {
            throw new InvalidArgumentException(
                'Word cannot be null or empty'
            );
        }

    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->word;
    }
}