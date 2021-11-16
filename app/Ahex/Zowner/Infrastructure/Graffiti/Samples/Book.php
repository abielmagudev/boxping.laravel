<?php

namespace App\Ahex\Zowner\Infrastructure\Graffiti\Samples;

abstract class Book
{
    public static function __callStatic($name, $arguments)
    {
        if(! method_exists(self::class, $name) )
            return [];
    }
}