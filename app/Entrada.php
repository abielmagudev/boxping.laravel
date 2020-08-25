<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $fillable = array(
        'numero',
        'consolidado_id',
        'cliente_id',
        'cliente_alias_numero',
        'vehiculo_id',
        'conductor_id',
        'vuelta',
        'cruce_fecha',
        'cruce_hora',
        'codigor_id',
        'reempacador_id',
        'reempacado_fecha',
        'reempacado_hora',
        'created_by_user',
        'updated_by_user',
    );

    public function getAliasNumeroAttribute()
    {
        if( $this->cliente_alias_numero )
            return $this->cliente->alias . $this->numero;
        
        return;
    }

    public function getCruceHorarioAttribute()
    {
        if( is_null($this->cruce_fecha) && is_null($this->cruce_hora) )
            return '';

        return date('h:i a', strtotime($this->cruce_hora)) . ', ' . date('d M,Y', strtotime($this->cruce_fecha));
    }

    public function getReempacadoHorarioAttribute()
    {
        if( is_null($this->reempacado_fecha) && is_null($this->reempacado_hora) )
            return '';

        return date('h:i a', strtotime($this->reempacado_hora)) . ', ' . date('d M,Y', strtotime($this->reempacado_fecha));
    }

    public function consolidado()
    {
        return $this->belongsTo(Consolidado::class);
    }
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
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

    public function remitente()
    {
        return $this->hasOne(Remitente::class);
    }

    public function destinatario()
    {
        return $this->hasOne(Destinatario::class);
    }

    public function observaciones()
    {
        return $this->hasMany(Observacion::class);
    }

    public function medidas()
    {
        return $this->hasMany(Medida::class);
    }

    public function creater()
    {
        return $this->belongsTo(User::class, 'created_by_user');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by_user');
    }
}
