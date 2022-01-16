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

    public function hasStatus(string $status)
    {
        return $this->status === $status;
    }

    public function hasRastreo()
    {
        return isset($this->rastreo);
    }

    public function hasConfirmacion()
    {
        return isset($this->confirmacion);
    }

    public function hasCobertura(string $cobertura = null)
    {
        if( is_null($cobertura) )
            return isset($this->cobertura);

        return $this->cobertura === $cobertura;
    }


    // Relations
    public function belongsSomeEntrada()
    {
        if( is_null($this->entrada_id) )
            return false;

        return $this->entrada instanceof \App\Entrada;
    }

    public function hasTransportadora()
    {
        if( is_null($this->transportadora_id) )
            return false;
            
        return is_a($this->transportadora, \App\Transportadora::class);
    }

    public function hasIncidentes()
    {
        return $this->incidentes->count() > 0;
    }

    public function hasDestinatario()
    {
        if(! $this->belongsSomeEntrada() )
            return false;

        return $this->entrada->hasDestinatario();
    }
}
