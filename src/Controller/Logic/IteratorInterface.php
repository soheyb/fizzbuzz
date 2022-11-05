<?php

namespace App\Controller\Logic;

interface IteratorInterface
{
    public function run($functions, $result) : string;
}