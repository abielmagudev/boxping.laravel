<?php 

namespace App\Ahex\Entrada\Domain;

Trait ScopesTrait
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
