<?php

namespace App\Ahex\Salida\Domain;

trait ScopesTrait {
    public function scopeExistsWithEntrada($query, $entrada_id)
    {
        return $query->where('entrada_id', $entrada_id)->exists();
    }
}
