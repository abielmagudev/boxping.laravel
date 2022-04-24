<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class ReempacadoInformant extends Informant
{
    protected static $tags = [
        'informacion' => [
            'complete' => 'Información de reempacado de la entrada (excepto descripción)',
            'compact' => 'Reempacado',
        ],
        'fecha_hora' => [
            'complete' => 'Fecha y hora de reempacado de la entrada',
            'compact' => 'Reempacado(fecha hora)',
        ],
        'fecha' => [
            'complete' => 'Fecha de reempacado de la entrada',
            'compact' => 'Reempacado(fecha)',
        ],
        'hora' => [
            'complete' => 'Hora de reempacado de la entrada',
            'compact' => 'Reempacado(hora)',
        ],
        'codigor' => [
            'complete' => 'Código de reempacado de la entrada',
            'compact' => 'Reempacado(código)',
        ],
        'descripcion' => [
            'complete' => 'Descripción del código de reempacado de la entrada',
            'compact' => 'Reempacadod(descripción)',
        ],
        'reempacador' => [
            'complete' => 'Reempacador que realizó el reempacado de la entrada',
            'compact' => 'Reempacado(usuario)',
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
