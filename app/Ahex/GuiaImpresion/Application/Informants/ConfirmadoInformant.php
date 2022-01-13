<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class ConfirmadoInformant extends Informant
{
    protected static $actions_labels = [
        'fecha_hora' => [
            'completa' => 'Fecha y hora de confirmado de la entrada',
            'compacta' => 'Confirmado',
        ],
        'nombre' => [
            'completa' => 'Nombre de usuario que confirmó la entrada',
            'compacta' => 'Confirmado(usuario)',
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
