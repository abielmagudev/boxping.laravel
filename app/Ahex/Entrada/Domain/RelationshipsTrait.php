<?php

namespace App\Ahex\Entrada\Domain;

use App\Consolidado;
use App\Cliente;
use App\Remitente;
use App\Destinatario;
use App\Vehiculo;
use App\Conductor;
use App\Codigor;
use App\Reempacador;
use App\Comentario;
use App\Etapa;
use App\EntradaEtapa;
use App\User;

Trait RelationshipsTrait
{
    public function consolidado()
    {
        return $this->belongsTo(Consolidado::class);
    }
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function remitente()
    {
        return $this->belongsTo(Remitente::class);
    }

    public function destinatario()
    {
        return $this->belongsTo(Destinatario::class);
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

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function etapas()
    {
        return $this->belongsToMany(Etapa::class, 'entradas_etapas')
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
