<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class SalidaIncidente extends Pivot
{
    protected $table = 'salida_incidente';

    public function salida()
    {
        return $this->belongsTo(Salida::class);
    }

    public function incidente()
    {
        return $this->belongsTo(Incidente::class);
    }
}
