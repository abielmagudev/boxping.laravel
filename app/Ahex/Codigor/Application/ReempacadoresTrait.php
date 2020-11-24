<?php

namespace App\Ahex\Codigor\Application;

Trait ReempacadoresTrait
{
    public function reempacadores($entradas)
    {
        $reempacadores = [];

        foreach($entradas as $entrada)
        {
            if( isset($reempacadores[$entrada->reempacador_id]) )
            {
                $reempacadores[$entrada->reempacador_id]->counter++;
                continue;
            }

            $reempacadores[$entrada->reempacador_id] = (object) [
                'nombre' => $entrada->reempacador->nombre,
                'counter' => 1,
            ];
        }

        return $reempacadores;
    }
}
