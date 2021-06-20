<?php

namespace App\Ahex\Entrada\Application\AfterStore;

use App\Entrada;

abstract class RedirectAfterStore
{ 
    private static $redirect;

    public static function route($next, Entrada $entrada)
    {
        self::setRedirect($entrada);
        return self::redirect($next);
    }

    private static function setRedirect(Entrada $entrada)
    {
        self::$redirect = $entrada->hasConsolidado() 
                        ? new EntradaConsolidadoStored($entrada) 
                        : new EntradaStored($entrada);
    }

    private static function redirect($next)
    {   
        return call_user_func([self::$redirect, $next]) ?: self::back();
    }

    /**
     * 
     * Retornar con helper redirect(), para posteriormente 
     * conectar metodo with() para flash-messages
     * 
     * Helper back() son para obtener la direccion previa y redireccionar a ella.
     * 
     * @return object
     * 
     * @return string url()->previous()
     */
    private static function back()
    {
        return redirect()->back();
    }
}
