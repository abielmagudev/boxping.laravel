<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etapa extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'nombre',
        'slug',
        'descripcion',
        'realizar_medicion',
        'peso_en',
        'volumen_en',
        'created_by',
        'updated_by',
    ];

    public function entradas()
    {
        return $this->belongsToMany(Entrada::class, 'entradas_etapas');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
