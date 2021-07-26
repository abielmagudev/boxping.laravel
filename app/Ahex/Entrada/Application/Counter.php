<?php

namespace App\Ahex\Entrada\Application;

use Illuminate\Support\Collection;

abstract class Counter
{
    private static $result = [];

    public static function byConductor(Collection $entradas)
    {
        foreach($entradas as $entrada)
        {
            if( ! array_key_exists($entrada->conductor_id, self::$result) )
            {
                self::$result[$entrada->conductor_id] = $entrada->conductor;
                self::$result[$entrada->conductor_id]->entradas = collect();
            }
            
            self::$result[$entrada->conductor_id]->entradas->push($entrada);
        }

        return self::$result;
    }

    public static function byReempacador(Collection $entradas)
    {
        foreach($entradas as $entrada)
        {
            if( ! array_key_exists($entrada->reempacador_id, self::$result) )
            {
                self::$result[$entrada->reempacador_id] = $entrada->reempacador;
                self::$result[$entrada->reempacador_id]->entradas = collect();
            }
            
            self::$result[$entrada->reempacador_id]->entradas->push($entrada);
        }

        return self::$result;
    }

    public static function byCodigor(Collection $entradas)
    {
        foreach($entradas as $entrada)
        {
            if( ! array_key_exists($entrada->codigor_id, self::$result) )
            {
                self::$result[$entrada->codigor_id] = $entrada->codigor;
                self::$result[$entrada->codigor_id]->entradas = collect();
            }
            
            self::$result[$entrada->codigor_id]->entradas->push($entrada);
        }

        return self::$result;
    }
}
