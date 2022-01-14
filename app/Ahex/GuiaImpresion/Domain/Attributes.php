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

    public function getInformacionAttribute()
    {
        return json_decode($this->informacion_encoded);
    }
    
    public function getInformacionArrayAttribute()
    {
        return json_decode($this->informacion_encoded, true); // get_object_vars( $this->informacion )
    }

    public function getInformacionJsonAttribute()
    {
        return $this->informacion_encoded;
    }

    public function getInformacionCounterAttribute()
    {
        return count( $this->informacion_array );
    }

    public function getTipoDescripcionAttribute()
    {
        return $this->tipo_descripcion_informacion;
    }
}
