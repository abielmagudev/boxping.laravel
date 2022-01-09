<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\Contents;

use App\Entrada;

class ImportadoContent extends Content
{
    protected static $actions_labels = [
        'fecha_hora' => [
            'large' => 'Fecha y hora de importado de la entrada',
            'small' => 'Importado Fecha Hora',
        ],
        'fecha' => [
            'large' => 'Fecha de importado de la entrada',
            'small' => 'Importado Fecha',
        ],
        'hora' => [
            'large' => 'Hora de importado de la entrada',
            'small' => 'Importado Hora',
        ],
        'vehiculo' => [
            'large' => 'Vehículo que realizo el importado la entrada',
            'small' => 'Importado Vehículo',
        ],
        'conductor' => [
            'large' => 'Conductor que realizo el importado la entrada',
            'small' => 'Importado Conductor',
        ],
        'numero_cruce' => [
            'large' => 'Número de cruce del importado de la entrada',
            'small' => 'Importado Número Cruce',
        ],
    ];

    public static function fecha_hora(Entrada $entrada)
    {
        return $entrada->hasFechaHoraImportado() ? $entrada->getFechaHoraImportado() : '';
    }

    public static function fecha(Entrada $entrada)
    {
        return $entrada->hasFechaImportado() ? $entrada->getFechaImportado() : '';
    }

    public static function hora(Entrada $entrada)
    {
        return $entrada->hasHoraImportado() ? $entrada->getHoraImportado() : '';
    }

    public static function vehiculo(Entrada $entrada)
    {
        return $entrada->hasVehiculo() ? $entrada->vehiculo->nombre : '';
    }

    public static function conductor(Entrada $entrada)
    {
        return $entrada->hasVehiculo() ? $entrada->conductor->nombre : '';
    }

    public static function numero_cruce(Entrada $entrada)
    {
        return $entrada->numero_cruce;
    }
}
