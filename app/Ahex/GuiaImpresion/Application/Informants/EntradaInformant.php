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
        'actualizado_fecha_hora' => [
            'completa' => 'Fecha y hora de la última actualización de la entrada',
            'minima' => 'Actualizado',
        ],
        'actualizado_nombre' => [
            'completa' => 'Nombre de usuario que recién actualizó la entrada',
            'minima' => 'Actualizado(usuario)',
        ],
        'creado_fecha_hora' => [
            'completa' => 'Fecha y hora de creación de la entrada',
            'minima' => 'Creado',
        ],
        'creado_nombre' => [
            'completa' => 'Nombre de usuario que creó la entrada',
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

    public static function actualizado_fecha_hora(Entrada $entrada)
    {
        return $entrada->updated_at;
    }

    public static function actualizado_nombre(Entrada $entrada)
    {
        return $entrada->updater ? $entrada->updater->name : 'Desconocido';
    }

    public static function creado_fecha_hora(Entrada $entrada)
    {
        return $entrada->created_at;
    }

    public static function creado_nombre(Entrada $entrada)
    {
        return $entrada->creator ? $entrada->creator->name : 'Desconocido';
    }
}
