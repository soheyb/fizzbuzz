<?php

namespace App\Controller\Logic;

use App\Controller\Values\Number;
use InvalidArgumentException;

/**
 * Handle the iteration logic
 */

class RangeIterator implements IteratorInterface
{
    private  $start;
    private  $end;

    /**
     * @param Number $start
     * @param Number $end
     */
    public function __construct(Number $start, Number $end) {
        $this->start = $start;
        $this->_setEnd($end);
    }

    protected function _setEnd($end)
    {
        if ($end->getValue() > 245) {
            throw new InvalidArgumentException(
                'Range cannot be over 254'
            );
        }
        else
        {
            $this->end = $end;
        }

    }

    /**
     * Recursive method for the iteration
     * @param $functions
     * @param $result
     * @return string
     */
    public function run($functions, $result): string
    {
        if ($this->start >= $this->end) {
            return $result;
        }
        $result .= call_user_func([$functions[0], $functions[1]], $this->start);
        $this->start = new Number($this->start->getValue() + 1);
        return $this->run($functions, $result);
    }

    /**
     * @return Number
     */
    public function getStart(): Number
    {
        return $this->start;
    }

    /**
     * @return Number
     */
    public function getEnd(): Number
    {
        return $this->end;
    }


}