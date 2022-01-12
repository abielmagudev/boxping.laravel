<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class ReempacadoInformant extends Informant
{
    protected static $actions_labels = [
        'fecha_hora' => [
            'large' => 'Fecha y hora de reempacado de la entrada',
            'small' => 'Reempacado Fecha Hora',
        ],
        'fecha' => [
            'large' => 'Fecha de reempacado de la entrada',
            'small' => 'Reempacado Fecha',
        ],
        'hora' => [
            'large' => 'Hora de reempacado de la entrada',
            'small' => 'Reempacado Hora',
        ],
        'codigor' => [
            'large' => 'Código de reempacado de la entrada',
            'small' => 'Reempacado Vehículo',
        ],
        'descripcion' => [
            'large' => 'Descripción del código de reempacado de la entrada',
            'small' => 'Reempacado Descripción',
        ],
        'reempacador' => [
            'large' => 'Reempacador que realizó el reempacado de la entrada',
            'small' => 'Reempacado Conductor',
        ],
    ];

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
