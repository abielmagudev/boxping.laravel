<?php

namespace App\Ahex\Salida\Domain;

trait RelationshipsTrait{
    public function entrada()
    {
        return $this->belongsTo(\App\Entrada::class);
    }
    
    public function transportadora()
    {
        return $this->belongsTo(\App\Transportadora::class)->withTrashed();
    }

    public function incidentes()
    {
        return $this->belongsToMany(\App\Incidente::class,'salida_incidente')->using(\App\SalidaIncidente::class);
    }
}
