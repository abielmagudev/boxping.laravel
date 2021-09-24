<?php

namespace App\Ahex\Salida\Domain;

trait ValidationsTrait
{
    public function isReal()
    {
        return isset($this->id);
    }

    public function hasCobertura($name)
    {
        return $this->cobertura === $name;
    }

    public function hasTransportadora($attr = false)
    {
        return is_a($this->transportadora, \App\Transportadora::class);
    }

    public function hasTransportadoraAttribute($attr)
    {
        if( ! $this->hasTransportadora() )
            return false;

        return isset($this->transportadora->$attr);
    }

    public function belongsSomeEntrada()
    {
        return $this->entrada instanceof \App\Entrada;
    }

    public function hasDestinatario()
    {
        if( ! $this->belongsSomeEntrada() )
            return false;

        return is_a($this->entrada->destinatario, \App\Destinatario::class);
    }
    
    public function hasIncidentes()
    {
        return $this->incidentes->count() > 0;
    }
}
