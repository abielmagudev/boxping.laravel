<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transportadora extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'web',
        'telefono',
        'notas'
    ];
}
