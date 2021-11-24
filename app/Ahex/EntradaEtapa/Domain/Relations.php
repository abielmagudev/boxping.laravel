<?php

namespace App\Ahex\EntradaEtapa\Domain;

trait Relations
{
    public function entrada()
    {
        return $this->belongsTo(\App\Entrada::class);
    }

    public function etapa()
    {
        return $this->belongsTo(\App\Etapa::class);
    }

    public function zona()
    {
        return $this->belongsTo(\App\Zona::class);
    }

    public function alertas()
    {
        if( ! $this->hasAlertas() )
            return collect([]);

        return \App\Alerta::whereIn('id', json_decode($this->alertas_id))->get();
    }
}
