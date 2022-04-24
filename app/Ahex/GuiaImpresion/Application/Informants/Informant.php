<?php 

namespace App\Ahex\GuiaImpresion\Application\Informants;

abstract class Informant
{   
    protected static $tags = [];

    public static function tags()
    {
        return static::$tags;
    }

    public static function tag(string $name, string $size = 'complete')
    {
        return isset( self::tags()[$name][$size] ) ? self::tags()[$name][$size] : null;
    }
}
