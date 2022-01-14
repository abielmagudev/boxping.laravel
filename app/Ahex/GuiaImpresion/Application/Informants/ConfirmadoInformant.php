<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class ConfirmadoInformant extends Informant
{
    protected static $actions_descriptions = [
        'fecha_hora' => [
            'completa' => 'Fecha y hora de confirmado de la entrada',
            'minima' => 'Confirmado',
        ],
        'nombre' => [
            'completa' => 'Nombre de usuario que confirmó la entrada',
            'minima' => 'Confirmado(usuario)',
        ],
    ];

    public static function fecha_hora(Entrada $entrada)
    {
        return $entrada->hasFechaHoraConfirmado() ? $entrada->confirmado_at : '?';
    }

    public static function nombre(Entrada $entrada)
    {
        return $entrada->hasConfirmador() ? $entrada->confirmador->name : '?';
    }
}
