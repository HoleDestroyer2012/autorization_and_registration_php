<?php

namespace App\Services;

class Viewes
{
    public static function part($part_name)
    {
        require_once "viewes/components/" . $part_name . ".php";
    }
}
