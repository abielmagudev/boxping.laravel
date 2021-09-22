<?php 

namespace App\Ahex\Entrada\Domain;

Trait ScopesTrait
{
    public function scopeFindByNumero($query, $numero)
    {
        return $query->where('numero', $numero)->first();
    }

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
