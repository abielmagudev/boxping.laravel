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

    public function scopeUltimaEtapa($etapas = null)
    {
        if( is_array($etapas) )
            return $etapas->sortBy('orden')->last();
            
        if( $etapas = $this->etapas );
            return $etapas->sortBy('orden')->last();

        return false;
    }

    public function scopeSalidaForzada()
    {
        if(! $this->salida instanceof \App\Salida )
            return new \App\Salida;

        return $this->salida;
    }
}