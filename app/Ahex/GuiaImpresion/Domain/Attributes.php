<?php

namespace App\Ahex\GuiaImpresion\Domain;

trait Attributes
{
    public function getFormatsAttribute()
    {
        return json_decode($this->formato_json);
    }

    public function getMarginsAttribute()
    {
        return json_decode($this->margenes_json);
    }

    public function getTypographyAttribute()
    {
        return json_decode($this->tipografia_json);
    }

    public function getContentAttribute()
    {
        return json_decode($this->contenido_json);
    }

    public function getFontNameAttribute()
    {
        return ucwords( $this->tipografia->fuente );
    }

    public function getFontSizeAttribute()
    {
        return $this->tipografia->tamano . $this->tipografia->medicion;
    }

    public function getPageSizeAttribute()
    {
        $width  = $this->formato->ancho . $this->formato->medicion;
        $height = $this->formato->altura . $this->formato->medicion;
        
        return  "{$width} {$height}";
    }

    public function getPageMarginsAttribute()
    {
        $top    = ! is_null($this->margenes->arriba)    ? $this->margenes->arriba . $this->margenes->medicion : 'auto';
        $right  = ! is_null($this->margenes->derecha)   ? $this->margenes->derecha . $this->margenes->medicion : 'auto';
        $bottom = ! is_null($this->margenes->abajo)     ? $this->margenes->abajo . $this->margenes->medicion : 'auto';
        $left   = ! is_null($this->margenes->izquierda) ? $this->margenes->izquierda . $this->margenes->medicion : 'auto';
        
        return "{$top} {$right} {$bottom} {$left}";
    }

    public static function getModelsContent()
    {
        return [
            'entrada' => \App\Entrada::attributesToPrint(),
            'remitente' => \App\Remitente::attributesToPrint(),
            'destinatario' => \App\Destinatario::attributesToPrint(),
            'salida' => \App\Salida::attributesToPrint(),
            'etapas' => \App\Etapa::attributesToPrint(),
        ];
    }

    public static function allPageSettings()
    {
        return (object) [
            'mediciones' => self::allPageMeasurements(),
            'tipografia' => (object) [
                'fuentes' => self::allFontNames(),
                'mediciones' => self::allFontMeasurements(),
            ],
        ];
    }
}
