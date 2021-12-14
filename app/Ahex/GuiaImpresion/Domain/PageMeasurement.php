<?php

namespace App\Ahex\GuiaImpresion\Domain;

trait PageMeasurement
{
    public static $cache_page_measurements;

    public static function cachePageMeasurements(string $key = 'longitud')
    {
        if( is_null( self::$cache_page_measurements ) )
           self::$cache_page_measurements = config('system.mediciones')[$key];
            
        return self::$cache_page_measurements;
    }

    public static function allPageMeasurements()
    {
        return self::cachePageMeasurements();
    }

    public static function existsPageMeasurement(string $key)
    {
        return isset( self::allPageMeasurements()[$key] );
    }

    public static function defaultPageMeasurement()
    {
        return array_key_first( self::allPageMeasurements() );
    }
}
