<?php

namespace App\Ahex\Consolidado\Domain;

trait Attributes
{
    public function isReal()
    {
        return ! is_null($this->id);
    }

    public function getStatusColorAttribute()
    {
        return self::getStatus($this->status, 'color');
    }

    public function getStatusDescripcionAttribute()
    {
        return self::getStatus($this->status, 'descripcion');
    }

    public static function existsStatus($key, $attr = null)
    {
        if( ! is_string($attr) )
            return isset(static::$all_status[$key]);

        return isset(static::$all_status[$key][$attr]);
    }

    public static function getStatus($key, $attr = null)
    {
        if( static::existsStatus($key) && ! is_string($attr) )
            return static::$all_status[$key];

        if( static::existsStatus($key, $attr) )
            return static::$all_status[$key][$attr];

        return static::STATUS_NO_EXISTE;
    }

    public static function getAllStatus($return_object = false)
    {
        if( $return_object )
            return (object) self::$all_status;

        return self::$all_status;
    }
}
