<?php

namespace App\Ahex\Entrada\Domain;

use App\Salida;

trait Relationships
{
    public function actualizaciones()
    {
        return $this->hasMany(\App\ActualizacionEntrada::class)->with('updater')->orderByDesc('id');
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
                        'largo',
                        'ancho',
                        'alto',
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
        return $this->etapas->sortBy('orden')->last();
        // return $etapas->max('orden') 
        // return $etapas->firstWhere('orden', $max_orden) 
    }
}
