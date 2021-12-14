<?php

namespace App\Ahex\GuiaImpresion\Domain;

trait Actions
{
    public function intentarImprimir()
    {
        $this->intentos++;
        return $this;
    }
}
