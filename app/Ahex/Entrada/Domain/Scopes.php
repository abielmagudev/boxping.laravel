<?php 

namespace App\Ahex\Entrada\Domain;

Trait Scopes
{
    public function scopeWithEtapas()
    {
        return $this->with('etapas');
    }

    public function scopeWithComentarios($query)
    {
        return $query->with(['comentarios.creator']);
    }
}