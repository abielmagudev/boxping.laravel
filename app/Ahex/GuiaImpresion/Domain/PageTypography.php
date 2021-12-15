<?php

namespace App\Ahex\GuiaImpresion\Domain;

trait PageTypography
{
    public static $cache_page_typography;

    public static function cacheTypography()
    {
        if( is_null( self::$cache_page_typography ) )
           self::$cache_page_typography = config('system.tipografias');

        return self::$cache_page_typography;
    }

    public static function existsTypography(string $key, string $value = null)
    {
        return ! is_null($value)
               ? isset( self::cacheTypography()[$key][$value] )
               : isset( self::cacheTypography()[$key] );    
    }

    public static function getTypography(string $key, string $value = null)
    {
        if(! is_null($value) && self::existsTypography($key, $value) )
            return self::cacheTypography()[$key][$value];

        if( self::existsTypography($key) )
            return self::cacheTypography()[$key];

        return; // NOT_FOUND
    }

    public static function existsFontName(string $name)
    {
        return self::existsTypography('fuentes', $name);
    }

    public static function existsFontMeasurement(string $name)
    {
        return self::existsTypography('mediciones', $name);
    }

    public static function allFontNames(string $glue = null)
    {
        $fonts_names = self::getTypography('fuentes');
        return is_null($glue) ?  : implode($glue, array_keys($fonts_names));
    }

    public static function allFontMeasurements(string $glue = null)
    {
        $fonts_measurements = self::getTypography('mediciones');
        return is_null($glue) ? $fonts_measurements : implode($glue, array_keys($fonts_measurements));
    }

    public static function defaultFontName()
    {
        return array_key_first( self::allFontsNames() );
    }

    public static function defaultFontMeasurement()
    {
        return array_key_first( self::allFontsMeasurements() );
    }
}
