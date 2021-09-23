<?php

namespace App\Ahex\Consolidado\Domain;

trait Scopes
{
    public function scopeIsAbierto($query, $value, $column = 'numero')
    {
        return $query->where($column, $value)->where('status', 'abierto')->exists();
    }

    public function scopeSearch($query, $value, $order = 'desc')
    {
        return $query->where('numero', 'like', "%{$value}%")->orderBy('id',$order);
    }
}
