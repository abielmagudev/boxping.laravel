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

    public function scopeWithRelations($query)
    {
        return $query->with([
            'consolidado',
            'cliente',
            'destinatario',
            'remitente',
            'conductor',
            'vehiculo',
            'codigor',
            'reempacador',
            'creator',
            'updater',
            'salida',
            'salida.incidentes',
            'salida.transportadora',
        ]);
    }
}
