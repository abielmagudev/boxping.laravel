<?php

namespace App\Ahex\Consolidado\Domain;

trait Attributes
{
    public function getStatusColorAttribute()
    {
        return self::status($this->status, 'color');
    }

    public function getStatusDescripcionAttribute()
    {
        return self::status($this->status, 'descripcion');
    } 
}
