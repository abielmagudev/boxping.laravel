<?php

namespace App\Ahex\GuiaImpresion\Domain;

use App\Ahex\GuiaImpresion\Application\ContentsMananger;

trait Actions
{
    public function incrementarIntentosImpresion(int $counter = 1)
    {
        $this->intentos_impresion += $counter;
        return $this->save();
    }
}
