<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = array(
        'nombre',
        'alias',
        'contacto',
        'telefono',
        'correo_electronico',
        'direccion',
        'ciudad',
        'estado',
        'pais',
        'notas',
        'disponible',
    );
}
