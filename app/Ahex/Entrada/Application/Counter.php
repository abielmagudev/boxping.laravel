<?php

namespace App\Ahex\Entrada\Application;

use Illuminate\Support\Collection;

abstract class Counter
{
    public static function byConductor(Collection $entradas)
    {
        $result = [];

        foreach($entradas as $entrada)
        {
            if( ! array_key_exists($entrada->conductor_id, $result) )
            {
                $result[$entrada->conductor_id] = $entrada->conductor;
                $result[$entrada->conductor_id]->entradas = collect();
            }
            
            $result[$entrada->conductor_id]->entradas->push($entrada);
        }

        return $result;
    }
}
