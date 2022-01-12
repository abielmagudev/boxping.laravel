<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\PageDesigner;

trait TypographyActions
{
    // All
    public static function allFonts()
    {
        if( self::hasCache('fonts') )
            return self::cache('fonts');

        return self::setCache('fonts', config('system.tipografias.fuentes'));
    }

    public static function allFontMeasurements()
    {
        if( self::hasCache('font_measurements') )
            return self::cache('font_measurements');

        return self::setCache('font_measurements', config('system.tipografias.mediciones'));
    }

    public static function allLineHeights()
    {
        if( self::hasCache('line_heights') )
            return self::cache('line_heights');

        return self::setCache('line_heights', config('system.tipografias.interlineados'));
    }


    // Defaults
    public static function defaultFont()
    {
        return array_key_first( self::allFonts() );
    }

    public static function defaultFontMeasurement()
    {
        return array_key_first( self::allFontMeasurements() );
    }

    public static function defaultLineHeight()
    {
        return self::allLineHeights()[0];
    }


    // Exists
    public static function existsFont(string $font)
    {
        return isset( self::allFonts()[$font] );
    }

    public static function existsFontMeasurement(string $font_measurement)
    {
        return isset( self::allFontMeasurements()[$font_measurement] );
    }

    
    // Implodes
    public function implodeFonts(string $glue = ',')
    {
        return implode($glue, self::allFonts());
    }

    public function implodeFontMeasurements(string $glue = ',')
    {
        return implode($glue, self::allFontMeasurements());
    }


    // Object
    public function fontname()
    {
        return $this->guide->tipografia->fuente;
    }

    public function fontsize()
    {
        return $this->guide->tipografia->tamano . $this->guide->tipografia->medicion;
    }
}
