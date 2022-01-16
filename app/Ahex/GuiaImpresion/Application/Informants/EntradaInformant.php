<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class EntradaInformant extends Informant
{
    protected static $actions_descriptions = [
        'numero' => [
            'completa' => 'Número de entrada',
            'minima' => 'Entrada',
        ],
        'contenido' => [
            'completa' => 'Contenido de la entrada',
            'minima' => 'Contenido',
        ],
        'actualizado' => [
            'completa' => 'Información de la reciente actualización de la entrada',
            'minima' => 'Actualizado',
        ],
        'creado' => [
            'completa' => 'Información de creación de la entrada',
            'minima' => 'Creado',
        ],
        'actualizado_fecha_hora' => [
            'completa' => 'Fecha y hora de la reciente actualización de la entrada',
            'minima' => 'Actualizado(fecha hora)',
        ],
        'creado_fecha_hora' => [
            'completa' => 'Fecha y hora de creación de la entrada',
            'minima' => 'Creado(fecha hora)',
        ],
        'actualizado_usuario' => [
            'completa' => 'Usuario que recién actualizó la entrada',
            'minima' => 'Actualizado(usuario)',
        ],
        'creado_usuario' => [
            'completa' => 'Usuario que creó la entrada',
            'minima' => 'Creado(usuario)',
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
