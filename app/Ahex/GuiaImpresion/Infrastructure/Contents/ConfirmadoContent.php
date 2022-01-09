<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\Contents;

use App\Entrada;

class ConfirmadoContent extends Content
{
    protected static $actions_labels = [
        'fecha_hora' => [
            'large' => 'Fecha y hora de confirmado de la entrada',
            'small' => 'Confirmado',
        ],
        'nombre' => [
            'large' => 'Nombre de usuario que confirmó la entrada',
            'small' => 'Confirmado por',
        ],
    ];

    public static function fecha(Entrada $entrada)
    {
        return $entrada->hasFechaHoraConfirmado() ? $entrada->confirmado_at : '';
    }

    public static function nombre(Entrada $entrada)
    {
        return $entrada->hasConfirmador() ? $entrada->confirmador->name : '';
    }
}
