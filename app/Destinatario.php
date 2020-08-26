<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destinatario extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $fillable = array(
        'nombre',
        'direccion',
        'codigo_postal',
        'ciudad',
        'estado',
        'pais',
        'referencias',
        'telefono',
        'created_by_user',
        'updated_by_user',
    );

    public function getLocalidadAttribute()
    {
        $localidad = array_map(function ($attr) {

            if( isset($this->$attr) ) return $this->$attr;
                
        }, ['ciudad','estado','pais']);

        return implode(', ', $localidad);
    }

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }

    public function creater()
    {
        return $this->belongsTo(User::class, 'created_by_user');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by_user');
    }
}
