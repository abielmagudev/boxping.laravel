<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class ReempacadoInformant extends Informant
{
    protected static $actions_descriptions = [
        'informacion' => [
            'completa' => 'Información de reempacado de la entrada (excepto descripción)',
            'minima' => 'Reempacado',
        ],
        'fecha_hora' => [
            'completa' => 'Fecha y hora de reempacado de la entrada',
            'minima' => 'Reempacado(fecha hora)',
        ],
        'fecha' => [
            'completa' => 'Fecha de reempacado de la entrada',
            'minima' => 'Reempacado(fecha)',
        ],
        'hora' => [
            'completa' => 'Hora de reempacado de la entrada',
            'minima' => 'Reempacado(hora)',
        ],
        'codigor' => [
            'completa' => 'Código de reempacado de la entrada',
            'minima' => 'Reempacado(código)',
        ],
        'descripcion' => [
            'completa' => 'Descripción del código de reempacado de la entrada',
            'minima' => 'Reempacadod(descripción)',
        ],
        'reempacador' => [
            'completa' => 'Reempacador que realizó el reempacado de la entrada',
            'minima' => 'Reempacado(usuario)',
        ],
    ];

    public static function informacion(Entrada $entrada)
    {
        return $entrada->hasReempacado() ? self::fecha_hora($entrada) . ' / ' . self::codigor($entrada) . ' / ' . self::reempacador($entrada) : 'Sin reempacado';
    }

    public static function fecha_hora(Entrada $entrada)
    {
        return $entrada->hasFechaHoraReempacado() ? $entrada->getFechaHoraReempacado() : '';
    }

    public static function fecha(Entrada $entrada)
    {
        return $entrada->hasFechaReempacado() ? $entrada->getFechaReempacado() : '';
    }

    public static function hora(Entrada $entrada)
    {
        return $entrada->hasHoraReempacado() ? $entrada->getHoraReempacado() : '';
    }

    public static function codigor(Entrada $entrada)
    {
        return $entrada->hasCodigor() ? $entrada->codigor->nombre : '';
    }

    public static function descripcion(Entrada $entrada)
    {
        return $entrada->hasCodigor() ? $entrada->codigor->descripcion : '';
    }

    public static function reempacador(Entrada $entrada)
    {
        return $entrada->hasReempacador() ? $entrada->reempacador->nombre : '';
    }
}
