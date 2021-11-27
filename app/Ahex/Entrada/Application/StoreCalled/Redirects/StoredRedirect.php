<?php

namespace App\Ahex\Entrada\Application\Store\Redirects;

abstract class StoredRedirect
{
    private static $stored;
    private static $redirect;

    public static function hasConsolidado($consolidado_id)
    {
        self::$stored = is_integer($consolidado_id)
                      ? new EntradaConsolidadoStored($consolidado_id)
                      : new EntradaStored;

        return new static;
    }

    public static function redirect($next)
    {
        self::$redirect = method_exists(self::$stored, $next)
                        ? call_user_func([self::$stored, $next])
                        : back();
                        
        return new static;
    }

    public static function with($status, $message)
    {
        return self::$redirect->with($status, $message);
    }
}
