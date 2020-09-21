<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etapa extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'nombre',
        'descripcion',
        'realizar_medicion',
        'created_by_user',
        'updated_by_user',
    ];

    public function entradas()
    {
        return $this->belongsToMany(Entrada::class, 'entradas_etapas');
    }
}
