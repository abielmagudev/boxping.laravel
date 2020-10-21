<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{    
    protected $fillable = [
        'nivel',
        'nombre',
        'descripcion',
    ];
}
