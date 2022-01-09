<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\Contents;

use App\Entrada;

class EntradaContent extends Content
{
    protected static $actions_labels = [
        'numero' => [
            'large' => 'Número de entrada',
            'small' => 'Entrada',
        ],
        'contenido' => [
            'large' => 'Contenido de la entrada',
            'small' => 'Contenido',
        ],
        'actualizado_fecha' => [
            'large' => 'Fecha de la última actualización de la entrada',
            'small' => 'Actualizado',
        ],
        'actualizado_nombre' => [
            'large' => 'Nombre de usuario que actualizó por última vez la entrada',
            'small' => 'Actualizado por',
        ],
        'creado_fecha' => [
            'large' => 'Fecha de creación de la entrada',
            'small' => 'Creado',
        ],
        'creado_nombre' => [
            'large' => 'Nombre de usuario que creó la entrada',
            'small' => 'Creado por',
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

    public static function actualizado_fecha(Entrada $entrada)
    {
        return $entrada->updated_at;
    }

    public static function actualizado_nombre(Entrada $entrada)
    {
        return $entrada->updater ? $entrada->updater->name : 'Desconocido';
    }

    public static function creado_fecha(Entrada $entrada)
    {
        return $entrada->created_at;
    }

    public static function creado_nombre(Entrada $entrada)
    {
        return $entrada->creator ? $entrada->creator->name : 'Desconocido';
    }
}