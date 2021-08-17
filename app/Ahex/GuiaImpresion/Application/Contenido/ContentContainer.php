<?php

namespace App\Ahex\GuiaImpresion\Application\Contenido;

abstract class ContentContainer
{
    private static $contents = [
        'entrada' => EntradaContent::class,
        'destinatario' => DestinatarioContent::class,
        'remitente' => RemitenteContent::class,
        'salida' => SalidaContent::class,
        'etapas' => EtapasContent::class,
    ];

    public static function all()
    {
        return array_map(function ($class) {
            return new $class;
        }, static::$contents); 
    }
}
