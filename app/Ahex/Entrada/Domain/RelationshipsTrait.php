<?php

namespace App\Ahex\Entrada\Domain;

use App\Cliente;
use App\Codigor;
use App\Comentario;
use App\Conductor;
use App\Consolidado;
use App\Destinatario;
use App\EntradaEtapa;
use App\Etapa;
use App\Reempacador;
use App\Remitente;
use App\Vehiculo;

Trait RelationshipsTrait
{
    public function consolidado()
    {
        return $this->belongsTo(Consolidado::class);
    }
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class)->withTrashed();
    }

    public function remitente()
    {
        return $this->belongsTo(Remitente::class)->withTrashed();
    }

    public function destinatario()
    {
        return $this->belongsTo(Destinatario::class)->withTrashed();
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class)->withTrashed();
    }

    public function conductor()
    {
        return $this->belongsTo(Conductor::class)->withTrashed();
    }

    public function codigor()
    {
        return $this->belongsTo(Codigor::class);
    }

    public function reempacador()
    {
        return $this->belongsTo(Reempacador::class);
    }

    public function verificador()
    {
        return $this->belongsTo(User::class, 'verificado_by');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function etapas()
    {
        return $this->belongsToMany(Etapa::class, 'entradas_etapas')
                    ->withTrashed()
                    ->using(EntradaEtapa::class)
                    ->withPivot([
                        'peso',
                        'medida_peso',
                        'ancho',
                        'altura',
                        'largo',
                        'medida_volumen',
                        'zona_id',
                        'alertas_id',
                        'created_by',
                        'updated_by',
                    ])
                    ->withTimestamps();
    }
}
