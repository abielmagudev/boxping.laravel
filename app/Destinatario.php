<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destinatario extends Model
{
    protected $fillable = array(
        'entrada_id',
        'nombre',
        'direccion',
        'codigo_postal',
        'ciudad',
        'estado',
        'pais',
        'referencias',
        'telefono',
        'verificado_at',
        'verificado_by_user',
        'created_by_user',
        'updated_by_user',
    );

    public function getLocalidadAttribute()
    {
        $localidad = array_map(function ($attr) {

            if( isset($this->$attr) ) return $this->$attr;
                
        }, ['ciudad','estado','pais',]);

        return implode(', ', $localidad);
    }

    public function getVerificacionAttribute()
    {
        return !is_null($this->verificado_by_user) && !is_null($this->verificado_at);
    }

    public function verificador()
    {
        return $this->belongsTo(User::class, 'verificado_by_user');
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
