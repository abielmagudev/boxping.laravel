<?php

namespace App\Ahex\Printing\Application\Requests;

class RequestSetupFactory
{
    const NO_SETUP = false;

    private static $routenames = [
        'printing.consolidado' => ConsolidadoRequest::class,
        'printing.entrada' => EntradaRequest::class,
        'printing.entradas' => EntradasRequest::class,
        'printing.salida' => SalidaRequest::class,
    ];

    public static function get($routename)
    {
        if( self::exists($routename) )
            return new self::$routenames[$routename];

        return self::NO_SETUP;
    }

    public static function exists($routename)
    {
        return array_key_exists($routename, self::$routenames);
    }

    public static function void()
    {
        return (object) [
            'rules' => [],
            'messages' => [],
        ];
    }
}
