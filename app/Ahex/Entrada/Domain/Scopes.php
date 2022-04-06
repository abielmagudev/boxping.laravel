<?php 

namespace App\Ahex\Entrada\Domain;

trait Scopes
{
    public function scopeExistsNumero($query, $numero)
    {
        return $query->where('numero', $numero)->exists();
    }

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

    public function scopeWithIndex($query, $attach = null)
    {
        $index = ['consolidado', 'cliente', 'destinatario'];

        if( isset($attach) )
        {
            if( is_array($attach) && count($attach) > 0 )
                $index = array_merge($index, array_values($attach));
    
            if( is_string($attach) &&! empty( trim($attach) ) )
                array_push($index, $attach);
        }

        return $query->with($index);
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
            'salida.updater',
        ]);
    }
}
