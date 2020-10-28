<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ahex\Entrada\Domain\Attributes;
use App\Ahex\Entrada\Domain\Scopes;

class Entrada extends Model
{
    use Attributes, Scopes;

    protected $fillable = array(
        
        // Entrada
        'numero',
        'consolidado_id',
        'cliente_id',
        'cliente_alias_numero',

        // Trayectoria
        'destinatario_id',
        'remitente_id',

        // Cruce
        'vehiculo_id',
        'conductor_id',
        'vuelta',
        'cruce_fecha',
        'cruce_hora',

        // Reempaque
        'codigor_id',
        'reempacador_id',
        'reempacado_fecha',
        'reempacado_hora',

        // Verificacion
        'verificado_by',
        'verificado_at',

        // Log
        'created_by',
        'updated_by',
    );

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
        return $this->belongsTo(Vehiculo::class);
    }

    public function conductor()
    {
        return $this->belongsTo(Conductor::class);
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
