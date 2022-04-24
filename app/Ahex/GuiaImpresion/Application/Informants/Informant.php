<?php 

namespace App\Ahex\GuiaImpresion\Application\Informants;

abstract class Informant
{   
    protected static $title = 'Titulo?...';

    protected static $tags = [];

    public static function title()
    {
        return static::$title;
    }

    public static function hasTags()
    {
        return is_array(static::$tags) && count(static::$tags) > 0;
    }

    public static function tags()
    {
        return static::$tags ?? [];
    }

    public static function tag(string $name, string $size = 'complete')
    {
        return isset( self::tags()[$name][$size] ) ? self::tags()[$name][$size] : null;
    }
}
