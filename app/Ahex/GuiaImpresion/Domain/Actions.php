<?php

namespace App\Ahex\GuiaImpresion\Domain;

trait Actions
{
    public function incrementarIntentosImpresion()
    {
        $this->intentos_impresion++;
        return $this;
    }
}
