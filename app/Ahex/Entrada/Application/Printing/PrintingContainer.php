<?php

namespace App\Ahex\Entrada\Application\Printing;

class PrintingContainer
{
    private static $handlers = [
        'informacion' => InformacionPrinting::class,
        'etapas' => EtapasPrinting::class,
        'etiqueta' => EtiquetaPrinting::class,
    ];

    public static function exists($handler)
    {
        return isset( self::$handlers[$handler] );
    }

    public static function get($handler)
    {
        if( ! self::exists($handler) )
            return abort(404);
            
        return new self::$handlers[$handler];
    }

    public static function sheets()
    {
        return array_keys( self::$handlers );
    }
}
