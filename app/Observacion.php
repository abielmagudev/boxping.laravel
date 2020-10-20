<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    protected $table = 'observaciones';
    
    protected $fillable = [
        'tipo',
        'nombre',
        'descripcion',
    ];
}
