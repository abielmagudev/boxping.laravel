<?php

namespace App\Ahex\Vehiculo\Application;

Trait ConductoresTrait
{
    private function conductoresDelVehiculo($entradas)
    {
        $conductores = array();

        foreach($entradas as $entrada)
        {
            if( array_key_exists($entrada->conductor_id, $conductores) )
            {
                $conductores[$entrada->conductor_id]['cruces']++;
                continue;
            }

            $conductores[$entrada->conductor_id] = [
                'nombre' => $entrada->conductor->nombre,
                'cruces' => 1,
            ];
        }

        return $conductores;
    }
}
