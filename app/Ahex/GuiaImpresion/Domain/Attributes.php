<?php

namespace App\Ahex\GuiaImpresion\Domain;

trait Attributes
{
    // JSON Decodes
    public function getFormatoAttribute()
    {
        return json_decode($this->formato_encoded);
    }

    public function getMargenesAttribute()
    {
        return json_decode($this->margenes_encoded);
    }

    public function getTipografiaAttribute()
    {
        return json_decode($this->tipografia_encoded);
    }

    public function getInformacionAttribute()
    {
        return json_decode($this->informacion_encoded);
    }
    
    public function getInformacionArrayAttribute()
    {
        return json_decode($this->informacion_encoded, true); // get_object_vars( $this->informacion )
    }


    // Formato attributes
    public function getMedidasPaginaAttribute()
    {
        $width  = $this->formato->ancho . $this->formato->medicion;
        $height = $this->formato->altura . $this->formato->medicion;
        
        return  "{$width} {$height}";
    }


    // Margenes attributes
    public function getMargenesPaginaAttribute()
    {
        $top    = ! is_null($this->margenes->arriba)    ? $this->margenes->arriba . $this->margenes->medicion : 'auto';
        $right  = ! is_null($this->margenes->derecha)   ? $this->margenes->derecha . $this->margenes->medicion : 'auto';
        $bottom = ! is_null($this->margenes->abajo)     ? $this->margenes->abajo . $this->margenes->medicion : 'auto';
        $left   = ! is_null($this->margenes->izquierda) ? $this->margenes->izquierda . $this->margenes->medicion : 'auto';
        
        return "{$top} {$right} {$bottom} {$left}";
    }


    // Tipografia attributes
    public function getNombreFuenteAttribute()
    {
        return ucwords( $this->tipografia->fuente );
    }

    public function getTamanoFuenteAttribute()
    {
        return is_float($this->tipografia->tamano) ? (float) $this->tipografia->tamano : (int) $this->tipografia->tamano;
    }

    public function getMedicionFuenteAttribute()
    {
        return $this->tipografia->medicion <> 'pc' ? $this->tipografia->medicion : '%';
    }

    public function getMedidasFuenteAttribute()
    {
        return $this->tamano_fuente . $this->medicion_fuente;
    }


    // Contenido attributes
    public function getContenidoJsonAttribute()
    {
        return $this->informacion_encoded;
    }

    public function getContenidoCounterAttribute()
    {
        return count( $this->informacion_array );
    }
}
