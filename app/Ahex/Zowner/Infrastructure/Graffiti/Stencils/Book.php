<?php

namespace App\Ahex\Zowner\Infrastructure\Graffiti\Stencils;

abstract class Book
{
    public static function __callStatic($name, $arguments)
    {
        if(! method_exists(self::class, $name) )
            return [];

        return call_user_func([self::class, $name]);
    }
}