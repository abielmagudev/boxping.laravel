<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remitente extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $fillable = array(
        'nombre',
        'direccion',
        'codigo_postal',
        'ciudad',
        'estado',
        'pais',
        'telefono',
        'created_by_user',
        'updated_by_user',
    );

    public function getLocalidadAttribute()
    {
        $localidad = array();

        foreach(['ciudad','estado','pais',] as $attr)
        {
            if( isset($this->$attr) )
                array_push($localidad, $this->$attr);
        }

        return implode(', ', $localidad);
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
