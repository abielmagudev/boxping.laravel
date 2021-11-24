<?php

namespace App\Ahex\EntradaEtapa\Domain;

trait Validations
{
    public function hasZona()
    {
        return (bool) isset($this->zona_id);
    }

    public function hasAlertas()
    {
        return (bool) isset($this->alertas_id);
    }

    public function hasAlerta(string $nivel)
    {
        if(! $this->hasAlertas() )
            return false;

        $filtered = array_filter($this->alertas(), function ($alerta) use ($nivel) {
            return $alerta->nivel === $nivel;
        });

        return (bool) count($filtered);
    }

    public function havePeso()
    {
        return is_numeric($this->peso); 
    }

    public function haveVolumen()
    {
        return !is_null($this->ancho) || !is_null($this->altura) || !is_null($this->largo); 
    }

    public function havePesoAndVolumen()
    {
        return $this->havePeso() === true && $this->haveVolumen() === true;
    }

    public function havePesoOrVolumen()
    {
        return $this->havePeso() === true || $this->haveVolumen() === true;
    }
}
