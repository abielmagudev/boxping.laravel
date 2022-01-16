<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class ConfirmadoInformant extends Informant
{
    protected static $actions_descriptions = [
        'informacion' => [
            'completa' => 'Información completa de confirmado de la entrada',
            'minima' => 'Confirmado',
        ],
        'fecha_hora' => [
            'completa' => 'Fecha y hora de confirmado de la entrada',
            'minima' => 'Confirmado(fecha hora)',
        ],
        'usuario' => [
            'completa' => 'Usuario que confirmó la entrada',
            'minima' => 'Confirmado(usuario)',
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
