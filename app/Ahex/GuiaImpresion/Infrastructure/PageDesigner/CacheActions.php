<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\PageDesigner;

trait CacheActions
{
    public static $cache = [];

    public static function hasCache(string $key)
    {
        return isset( self::$cache[$key] );
    }

    public static function setCache(string $key, $value)
    {
        return self::$cache[$key] = $value;
    }

    public static function cache(string $key, $default = null)
    {
        return self::$cache[$key] ?? $default;
    }
}
