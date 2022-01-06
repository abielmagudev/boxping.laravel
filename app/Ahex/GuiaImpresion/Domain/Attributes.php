<?php

namespace App\Ahex\GuiaImpresion\Domain;

trait Attributes
{
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

    public function getNombreFuenteAttribute()
    {
        return ucwords( $this->tipografia->fuente );
    }

    public function getMedicionTamanoFuenteAttribute()
    {
        return $this->tipografia->medicion <> 'pc' ? $this->tipografia->medicion : '%';
    }

    public function getMedidasFuenteAttribute()
    {
        return $this->tipografia->tamano . $this->medicion_tamano_fuente;
    }

    public function getMedidasPaginaAttribute()
    {
        $width  = $this->formato->ancho . $this->formato->medicion;
        $height = $this->formato->altura . $this->formato->medicion;
        
        return  "{$width} {$height}";
    }

    public function getMargenesPaginaAttribute()
    {
        $top    = ! is_null($this->margenes->arriba)    ? $this->margenes->arriba . $this->margenes->medicion : 'auto';
        $right  = ! is_null($this->margenes->derecha)   ? $this->margenes->derecha . $this->margenes->medicion : 'auto';
        $bottom = ! is_null($this->margenes->abajo)     ? $this->margenes->abajo . $this->margenes->medicion : 'auto';
        $left   = ! is_null($this->margenes->izquierda) ? $this->margenes->izquierda . $this->margenes->medicion : 'auto';
        
        return "{$top} {$right} {$bottom} {$left}";
    }

    public function getContenidoAttribute()
    {
        return json_decode($this->contenido_encoded);
    }
    
    public function getContenidoArrayAttribute()
    {
        return json_decode($this->contenido_encoded, true); // get_object_vars( $this->contenido )
    }

    public function getContenidoJsonAttribute()
    {
        return $this->contenido_encoded;
    }

    public function getContenidoCounterAttribute()
    {
        return count( (array) $this->contenido );
    }

}
