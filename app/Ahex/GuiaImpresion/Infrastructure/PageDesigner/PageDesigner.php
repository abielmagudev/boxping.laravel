<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\PageDesigner;

use App\GuiaImpresion;

class PageDesigner
{
    use Topics\Format,
        Topics\Information,
        Topics\Typography;

    const DEFAULT_NOT_FOUND = null;

    const METHOD_NOT_EXISTS = null;

    const PROPERTY_NOT_EXISTS = null;

    private $guide;

    public function __construct(GuiaImpresion $guia)
    {
        $this->guide = $guia;
    }

    public function __call($name, $arguments)
    {
        if( method_exists($this->guide, $name))
            return call_user_func_array([$this->guide, $name], $arguments);

        return self::METHOD_NOT_EXISTS;
    }

    public function __get($name)
    {
        if( property_exists($this->guide, $name) )
            return $this->guide->$name;

        return self::PROPERTY_NOT_EXISTS;
    }

    public static function measurements()
    {
        return config('system.mediciones.longitud');
    }

    public static function alignments()
    {
        return config('system.tipografias.alineaciones');
    }

    public static function fonts()
    {
        return config('system.tipografias.fuentes');
    }

    public static function fontMeasurements()
    {
        return config('system.tipografias.mediciones');
    }

    public static function lineHeights()
    {
        return config('system.tipografias.interlineados');
    }

    public static function defaults()
    {
        return [
            'alignment' => array_key_first( self::allAlignments() ),
            'font' => array_key_first( self::allFonts() ),
            'font size' => 16,
            'font measurement' => array_key_first( self::allFontMeasurements() ),
            'line height' => self::allLineHeights()[0],
            'measurement' => array_key_first( self::allMeasurements() ),
        ];
    }

    public static function default(string $key)
    {
        return array_key_exists($key, self::defaults()) 
                ? self::defaults()[$key] 
                : self::DEFAULT_NOT_FOUND;
    }
}
