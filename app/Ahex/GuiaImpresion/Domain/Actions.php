<?php

namespace App\Ahex\GuiaImpresion\Domain;

trait Actions
{
    public function incrementarIntentosImpresion(int $counter = 1)
    {
        $this->intentos_impresion += $counter;
        return $this->save();
    }
}
