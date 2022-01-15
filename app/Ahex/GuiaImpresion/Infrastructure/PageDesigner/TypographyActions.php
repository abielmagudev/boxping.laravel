<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\PageDesigner;

trait TypographyActions
{
    // All
    public static function allAlignments(string $glue = null)
    {
        if(! self::hasCache('alignments') )
            self::setCache('alignments', config('system.tipografias.alineaciones'));
            
        return isset($glue) ? implode($glue, array_keys(self::cache('alignments'))) : self::cache('alignments');
    }

    public static function allFonts(string $glue = null)
    {
        if(! self::hasCache('fonts') )
            self::setCache('fonts', config('system.tipografias.fuentes'));
            
        return isset($glue) ? implode($glue, array_keys(self::cache('fonts'))) : self::cache('fonts');
    }

    public static function allFontMeasurements(string $glue = null)
    {
        if(! self::hasCache('font_measurements') )
            self::setCache('font_measurements', config('system.tipografias.mediciones'));
        
        return isset($glue) ? implode($glue, array_keys(self::cache('font_measurements'))) : self::cache('font_measurements');
    }

    public static function allLineHeights(string $glue = null)
    {
        if(! self::hasCache('line_heights') )
            self::setCache('line_heights', config('system.tipografias.interlineados'));
        
        return isset($glue) ? implode($glue, array_keys(self::cache('line_heights'))) : self::cache('line_heights');
    }


    // Defaults
    public static function defaultAlignment()
    {
        return array_key_first( self::allAlignments() );
    }

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


    // Object
    public function textAlign()
    {
        return $this->guide->tipografia->alineacion;
    }

    public function fontName()
    {
        return $this->guide->tipografia->fuente;
    }

    public function fontSize()
    {
        return $this->guide->tipografia->tamano . $this->guide->tipografia->medicion;
    }
}
