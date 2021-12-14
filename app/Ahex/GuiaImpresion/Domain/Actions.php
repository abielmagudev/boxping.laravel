<?php

namespace App\Ahex\GuiaImpresion\Domain;

trait Actions
{
    public function incrementarIntentos()
    {
        $this->intentos++;
        return $this;
    }
}
