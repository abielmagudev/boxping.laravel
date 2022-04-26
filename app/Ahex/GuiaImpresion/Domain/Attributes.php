<?php

namespace App\Ahex\GuiaImpresion\Domain;

use App\Ahex\GuiaImpresion\Infrastructure\PageDesigner\PageDesigner;

trait Attributes
{
    // Decode
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

    public function getInformacionCounterAttribute()
    {
        return count( $this->informacion_array );
    }

    public function getInformacionJsonAttribute()
    {
        return $this->informacion_encoded;
    }

    /*
    public function getTipoDescripcionAttribute()
    {
        return $this->tipo_descripcion_informacion;
    }
    */

    // Formato
    public function getFormatoAnchoAttribute()
    {
        return $this->formato->ancho ?? null;
    }

    public function getFormatoAltoAttribute()
    {
        return $this->formato->alto ?? null;
    }

    public function getFormatoMedicionAttribute()
    {
        return $this->formato->medicion ?? null;
    }

    // Margenes
    public function getMargenArribaAttribute()
    {
        return $this->margenes->arriba ?? null;
    }

    public function getMargenDerechaAttribute()
    {
        return $this->margenes->derecha ?? null;
    }

    public function getMargenAbajoAttribute()
    {
        return $this->margenes->abajo ?? null;
    }

    public function getMargenIzquierdaAttribute()
    {
        return $this->margenes->izquierda ?? null;
    }

    public function getMargenesMedicionAttribute()
    {
        return $this->margenes->medicion ?? null;
    }
    
    // Tipografia
    public function getTipografiaAlineacionAttribute()
    {
        return $this->tipografia->alineacion ?? null;
    }

    public function getTipografiaFuenteAttribute()
    {
        return $this->tipografia->fuente ?? null;
    }

    public function getTipografiaTamanoAttribute()
    {
        return $this->tipografia->tamano ?? PageDesigner::default('font size');
    }

    public function getTipografiaMedicionAttribute()
    {
        return $this->tipografia->medicion ?? null;
    }
}
