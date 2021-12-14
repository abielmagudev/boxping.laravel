<?php

namespace App\Ahex\GuiaImpresion\Infrastructure;

abstract class PrintableContentContainer
{
    public static function all()
    {
        return [
            'entrada' => \App\Entrada::class,
            'salida' => \App\Salida::class,
            'destinatario' => \App\Destinatario::class,
            'remitente' => \App\Remitente::class,
            'etapas' => \App\Etapa::class,
        ];
    }
}
