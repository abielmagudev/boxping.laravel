<?php

namespace App\Ahex\EntradaEtapa\Domain;

trait Validations
{
    public function hasZona()
    {
        return isset($this->zona_id);
    }

    public function hasAlertas()
    {
        return isset($this->alertas_id);
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

    public function hasPeso()
    {
        return is_numeric($this->peso); 
    }

    public function hasVolumen()
    {
        return isset($this->ancho, $this->altura, $this->largo); 
    }

    public function hasAnyVolumen()
    {
        return isset($this->ancho) || isset($this->altura) || isset($this->largo); 
    }

    public function hasPesoAndVolumen()
    {
        return $this->hasPeso() && $this->hasVolumen();
    }

    public function hasPesoAndAnyVolumen()
    {
        return $this->hasPeso() && $this->hasAnyVolumen();
    }

    public function hasPesoOrVolumen()
    {
        return $this->havePeso() || $this->hasVolumen();
    }
}
