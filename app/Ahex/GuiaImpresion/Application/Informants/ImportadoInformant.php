<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class ImportadoInformant extends Informant
{
    protected static $actions_labels = [
        'fecha_hora' => [
            'completa' => 'Fecha y hora de importado de la entrada',
            'compacta' => 'Importado',
        ],
        'fecha' => [
            'completa' => 'Fecha de importado de la entrada',
            'compacta' => 'Importado(fecha)',
        ],
        'hora' => [
            'completa' => 'Hora de importado de la entrada',
            'compacta' => 'Importado(hora)',
        ],
        'vehiculo' => [
            'completa' => 'Vehículo que realizo el importado la entrada',
            'compacta' => 'Importado(vehículo)',
        ],
        'conductor' => [
            'completa' => 'Conductor que realizo el importado la entrada',
            'compacta' => 'Importado(conductor)',
        ],
        'numero_cruce' => [
            'completa' => 'Número de cruce del importado de la entrada',
            'compacta' => 'Importado(cruce)',
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
