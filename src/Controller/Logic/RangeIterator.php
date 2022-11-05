<?php

namespace App\Controller\Logic;

use App\Controller\Values\Number;


class RangeIterator implements IteratorInterface
{
    private  $start;
    private  $end;

    public function __construct(Number $start, Number $end) {
        $this->start = $start;
        $this->end = $end;
    }

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