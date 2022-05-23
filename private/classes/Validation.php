<?php

use JetBrains\PhpStorm\Pure;

class Validation
{

    public static function required($data): bool
    {
        return !empty(trim($data));
    }

    public static function min($data, $min): bool
    {
        return strlen(trim($data)) >= $min;
    }

    public static function is_numeric($data): bool
    {
        return is_numeric($data);
    }

    public static function is_greater_than($data, int $num): bool
    {
        return self::is_numeric($data) && $data > $num;
    }


    public static function max($data, $max): bool
    {
        return strlen(trim($data)) <= $max;
    }

    public static function clean($data): string
    {
        return htmlspecialchars(trim($data));
    }



}
