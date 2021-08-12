<?php

namespace App\Ahex\GuiaImpresion\Application\Contenido;

abstract class ContentContainer
{
    private static $contents = [
        'destinatario' => DestinatarioContent::class,
        'remitente' => RemitenteContent::class,
        'salida' => SalidaContent::class,
        'etapa' => EtapaContent::class,
    ];

    public static function all()
    {
        return array_map( function ($class) {
            return new $class;
        }, static::$contents); 
    }
}
