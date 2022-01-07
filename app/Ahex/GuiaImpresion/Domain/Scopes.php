<?php

namespace App\Ahex\GuiaImpresion\Domain;

trait Scopes
{
    public static function scopeActivadas($query, $by = 'nombre', $order = 'desc')
    {
        return $query->where('activada', 1)->orderBy($by, $order)->get();
    }

    public static function scopeDesactivadas($query, $by = 'nombre', $order = 'desc')
    {
        return $query->where('activada', 0)->orderBy($by, $order)->get();
    }
}
