<?php

namespace App\Ahex\Entrada\Application;

use App\Entrada;

abstract class RedirectAfterStored
{
    private static $actions = [
        'crear' => 'toCreate',
        'finalizar' => 'toFinish',
    ];

    public static function next(Entrada $entrada, string $action)
    {
        if(! self::existsAction($action) )
            return self::toFinish($entrada);

        return call_user_func([self::class, self::getAction($action)], $entrada);
    }

    public static function existsAction(string $action)
    {
        return isset( self::$actions[$action] );
    }

    public static function getAction($action)
    {
        return self::$actions[$action];
    }

    public static function toCreate(Entrada $entrada)
    {
        if(! $entrada->hasConsolidado() )
            return redirect()->route('entradas.create')->onlyInput('cliente');
        
        return redirect()->route('entradas.create', ['consolidado' => $entrada->consolidado_id]);
    }

    public static function toFinish(Entrada $entrada)
    {
        if(! $entrada->hasConsolidado() )
            return redirect()->route('entradas.index');
            
        return redirect()->route('consolidados.show', $entrada->consolidado_id);
    }   
}
