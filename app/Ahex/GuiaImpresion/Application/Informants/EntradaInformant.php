<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class EntradaInformant extends Informant
{
    protected static $tags = [
        'numero' => [
            'complete' => 'Número de entrada',
            'compact' => 'Entrada',
        ],
        'contenido' => [
            'complete' => 'Contenido de la entrada',
            'compact' => 'Contenido',
        ],
        'actualizado' => [
            'complete' => 'Información de la reciente actualización de la entrada',
            'compact' => 'Actualizado',
        ],
        'creado' => [
            'complete' => 'Información de creación de la entrada',
            'compact' => 'Creado',
        ],
        'actualizado_fecha_hora' => [
            'complete' => 'Fecha y hora de la reciente actualización de la entrada',
            'compact' => 'Actualizado(fecha hora)',
        ],
        'creado_fecha_hora' => [
            'complete' => 'Fecha y hora de creación de la entrada',
            'compact' => 'Creado(fecha hora)',
        ],
        'actualizado_usuario' => [
            'complete' => 'Usuario que recién actualizó la entrada',
            'compact' => 'Actualizado(usuario)',
        ],
        'creado_usuario' => [
            'complete' => 'Usuario que creó la entrada',
            'compact' => 'Creado(usuario)',
        ],
    ];

    public static function numero(Entrada $entrada)
    {
        return $entrada->numero;
    }

    public static function contenido(Entrada $entrada)
    {
        return $entrada->contenido;
    }

    public static function actualizado(Entrada $entrada)
    {
        return self::actualizado_fecha_hora($entrada) . ' / ' . self::actualizado_usuario($entrada);
    }

    public static function creado(Entrada $entrada)
    {
        return self::creado_fecha_hora($entrada) . ' / ' . self::creado_usuario($entrada);
    }

    public static function actualizado_fecha_hora(Entrada $entrada)
    {
        return $entrada->updated_at;
    }

    public static function creado_fecha_hora(Entrada $entrada)
    {
        return $entrada->created_at;
    }

    public static function actualizado_usuario(Entrada $entrada)
    {
        return $entrada->updater ? $entrada->updater->name : '?';
    }

    public static function creado_usuario(Entrada $entrada)
    {
        return $entrada->creator ? $entrada->creator->name : '?';
    }
}
