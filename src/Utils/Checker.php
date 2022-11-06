<?php

namespace App\Utils;

/**
 * Class used to have the different utility methods related to checking datas
 */

class Checker
{
    /**
     * Method to company 2 arrays
     *
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

        return in_array("", $received, true) !== true && min($received) >= 0 && $received['limit'] <=245;
    }
}
