<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\PageDesigner;

trait CacheActions
{
    public static $cache = [];

    public static function hasCache(string $key)
    {
        return isset( self::$cache[$key] );
    }

    public static function setCache(string $key, mixed $value)
    {
        return self::$cache[$key] = $value;
    }

    public static function cache(string $key, mixed $default = null)
    {
        return self::$cache[$key] ?? $default;
    }
}
