<?php

namespace App\Ahex\Reempacador\Application;

Trait CodigosrTrait
{
    public function codigosr($entradas)
    {
        $codigosr = [];

        foreach($entradas as $entrada)
        {
            if( isset($codigosr[$entrada->codigor_id]) )
            {
                $codigosr[$entrada->codigor_id]->counter++;
                continue;
            }

            $codigosr[$entrada->codigor_id] = (object) [
                'nombre' => $entrada->codigor->nombre,
                'counter' => 1,
            ];
        }

        return $codigosr;
    }
}
