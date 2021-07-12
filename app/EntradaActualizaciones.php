<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntradaActualizaciones extends Model
{
    protected $table = 'entrada_actualizaciones';
    
    protected $fillable = [
        'descripcion',
        'entrada_id',
        'user_id',
    ];

    public function updater()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
