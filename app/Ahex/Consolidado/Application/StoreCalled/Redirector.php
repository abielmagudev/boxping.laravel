<?php

namespace App\Ahex\Consolidado\Application\StoreCalled;

use App\Consolidado;

abstract class Redirector
{
    public static function route($next = 0, Consolidado $consolidado)
    {
        switch ($next) {
            case 2:
                return static::addEntradas($consolidado);
                break;
            
            case 1:
                return static::createConsolidado();
                break;
            
            default:
                return static::indexConsolidado();
                break;
        }
    }

    public static function addEntradas($consolidado)
    {
        return route('entradas.create', ['consolidado' => $consolidado->id]);
    }

    public static function createConsolidado()
    {
        return route('consolidados.create');
    }

    public static function indexConsolidado()
    {
        return route('consolidados.index');
    }
}
