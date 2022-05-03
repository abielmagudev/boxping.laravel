<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActualizacionSalida extends Model
{
    protected $table = 'actualizaciones_salida';

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
