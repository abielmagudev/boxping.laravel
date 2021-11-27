<?php

namespace App\Ahex\Entrada\Domain;

use App\Salida;

trait Relationships
{
    public function actualizaciones()
    {
        return $this->hasMany(\App\EntradaActualizacion::class)->with('updater')->orderByDesc('id');
    }

    public function comentarios()
    {
        return $this->hasMany(\App\Comentario::class)->with('creator')->orderBy('id', 'desc');
    }

    public function cliente()
    {
        return $this->belongsTo(\App\Cliente::class)->withTrashed();
    }
    
    public function consolidado()
    {
        return $this->belongsTo(\App\Consolidado::class);
    }

    public function destinatario()
    {
        return $this->belongsTo(\App\Destinatario::class)->withTrashed();
    }

    public function remitente()
    {
        return $this->belongsTo(\App\Remitente::class)->withTrashed();
    }

    public function codigor()
    {
        return $this->belongsTo(\App\Codigor::class)->withTrashed();
    }

    public function reempacador()
    {
        return $this->belongsTo(\App\Reempacador::class)->withTrashed();
    }

    public function vehiculo()
    {
        return $this->belongsTo(\App\Vehiculo::class)->withTrashed();
    }

    public function conductor()
    {
        return $this->belongsTo(\App\Conductor::class)->withTrashed();
    }

    public function confirmador()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function salida()
    {
        return $this->hasOne(Salida::class);
    }

    public function salidaForzada()
    {
        return ! $this->salida instanceof Salida ? new Salida : $this->salida;
    }

    public function etapas()
    {
        return $this->belongsToMany(\App\Etapa::class)
                    ->using(\App\EntradaEtapa::class)
                    ->as('entrada_etapa')
                    ->withPivot([
                        'peso',
                        'medicion_peso',
                        'ancho',
                        'altura',
                        'largo',
                        'medicion_volumen',
                        'zona_id',
                        'alertas_id',
                        'created_by',
                        'updated_by',
                    ])
                    ->withTimestamps()
                    ->withTrashed()
                    ->orderBy('orden');
    }

    public function ultimaEtapa()
    {
        // return $etapas->max('orden') 
        // return $etapas->firstWhere('orden', $max_orden) 
        return $this->etapas->sortBy('orden')->last();
    }
}
