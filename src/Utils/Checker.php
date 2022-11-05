<?php

namespace App\Utils;


class Checker
{
    /**
     * @param array $expected
     * @param array $received
     * @return bool
     */
    public static function arrayCompare(array $expected, array $received): bool
    {
        foreach ($expected as $item) {
            if (array_key_exists($item, $received) === false) {
                return false;
            }
        }
        return in_array("", $received, true) !== true;
    }
}
