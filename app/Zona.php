<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table = 'etapa_zonas';

    protected $fillable = [
        'etapa_id',
        'nombre',
    ];

    public function etapa()
    {
        return $this->belongTo(Etapa::class);
    }
}
