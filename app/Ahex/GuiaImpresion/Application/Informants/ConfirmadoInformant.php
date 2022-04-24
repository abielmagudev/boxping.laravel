<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class ConfirmadoInformant extends Informant
{
    protected static $title = 'Confirmación';

    protected static $tags = [
        'informacion' => [
            'complete' => 'Información completa de confirmado de la entrada',
            'compact' => 'Confirmado',
        ],
        'fecha_hora' => [
            'complete' => 'Fecha y hora de confirmado de la entrada',
            'compact' => 'Confirmado(fecha hora)',
        ],
        'usuario' => [
            'complete' => 'Usuario que confirmó la entrada',
            'compact' => 'Confirmado(usuario)',
        ],
    ];

    public static function informacion(Entrada $entrada)
    {
        return $entrada->hasConfirmado() ? self::fecha_hora($entrada) . ' / ' . self::usuario($entrada) : 'Sin confirmación';
    }

    public static function fecha_hora(Entrada $entrada)
    {
        return $entrada->hasFechaHoraConfirmado() ? $entrada->confirmado_at : '?';
    }

    public static function usuario(Entrada $entrada)
    {
        return $entrada->hasConfirmador() ? $entrada->confirmador->name : '?';
    }
}
