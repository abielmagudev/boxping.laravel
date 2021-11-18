<?php

namespace App\Ahex\Salida\Domain;

trait Validations
{
    public function isReal()
    {
        return isset($this->id);
    }

    public function isOver()
    {
        return $this->status === 'entregado';
    }

    public function hasStatus($status)
    {
        return $this->status === $status;
    }

    public function belongsSomeEntrada()
    {
        return $this->entrada instanceof \App\Entrada;
    }

    public function hasDestinatario()
    {
        if( ! $this->belongsSomeEntrada() )
            return false;

        return $this->entrada->hasDestinatario();
    }

    public function hasTransportadora()
    {
        return is_a($this->transportadora, \App\Transportadora::class);
    }
    
    public function hasIncidentes()
    {
        return $this->incidentes->count() > 0;
    }

    public function hasCobertura($cobertura = null)
    {
        if( is_null($cobertura) )
            return isset($this->cobertura);

        return $this->cobertura === $cobertura;
    }

    public static function existsCobertura($cobertura)
    {
        return isset( self::$all_coberturas[$cobertura] );
    }
}
