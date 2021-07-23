<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalidaActualizacion extends Model
{
    protected $table = 'salida_actualizaciones';

    protected $fillable = [
        'descripcion',
        'salida_id',
        'user_id',
    ];

    public function salida()
    {
        return $this->belongsTo(Salida::class);
    }

    public function updater()
    {
        return $this->belongsTo(User::class);
    }
}
