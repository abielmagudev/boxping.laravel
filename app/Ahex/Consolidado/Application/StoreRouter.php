<?php

namespace App\Ahex\Consolidado\Application;

abstract class StoreRouter
{
    public static function get($next = 0, $params)
    {
        switch ($next) {
            case 2:
                return static::addEntradas($params);
                break;
            
            case 1:
                return static::create();
                break;
            
            default:
                return static::index();
                break;
        }
    }

    public static function addEntradas($consolidado_id)
    {
        return route('entradas.create', ['consolidado' => $consolidado_id]);
    }

    public static function create()
    {
        return route('consolidados.create');
    }

    public static function index()
    {
        return route('consolidados.index');
    }
}
