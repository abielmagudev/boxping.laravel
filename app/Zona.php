<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'etapa_id',
    ];

    public function etapa()
    {
        return $this->belongTo(Etapa::class);
    }
}
