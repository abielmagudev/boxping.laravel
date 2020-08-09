<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remitente extends Model
{
    public function getLocalidadAttribute()
    {
        $localidad = array_map(function ($attr) {

            if( isset($this->$attr) )
                return $this->$attr;
                
        }, ['ciudad','estado','pais',]);

        return implode(', ', $localidad);
    }
}
