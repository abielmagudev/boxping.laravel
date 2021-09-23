<?php

namespace App\Ahex\Consolidado\Domain;

trait Relationships
{
    public function entradas()
    {
        return $this->hasMany(\App\Entrada::class);
    }

    public function cliente()
    {
        return $this->belongsTo(\App\Cliente::class)->withTrashed();
    }
}
