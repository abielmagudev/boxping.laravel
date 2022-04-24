<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class ImportadoInformant extends Informant
{
    protected static $title = 'Importación';

    protected static $tags = [
        'informacion' => [
            'complete' => 'Información de importado de la entrada (excepto número de cruce)',
            'compact' => 'Importado',
        ],
        'fecha_hora' => [
            'complete' => 'Fecha y hora de importado de la entrada',
            'compact' => 'Importado(fecha hora)',
        ],
        'fecha' => [
            'complete' => 'Fecha de importado de la entrada',
            'compact' => 'Importado(fecha)',
        ],
        'hora' => [
            'complete' => 'Hora de importado de la entrada',
            'compact' => 'Importado(hora)',
        ],
        'vehiculo' => [
            'complete' => 'Vehículo que realizó el importado la entrada',
            'compact' => 'Importado(vehículo)',
        ],
        'conductor' => [
            'complete' => 'Conductor que realizó el importado la entrada',
            'compact' => 'Importado(conductor)',
        ],
        'numero_cruce' => [
            'complete' => 'Número de cruce de importado de la entrada',
            'compact' => 'Importado(cruce)',
        ],
    ];

    public static function informacion(Entrada $entrada)
    {
        return $entrada->hasImportado() ? self::fecha_hora($entrada) . ' / ' . self::vehiculo($entrada) . ' / ' . self::conductor($entrada) : 'Sin importado';
    }

    public static function fecha_hora(Entrada $entrada)
    {
        return $entrada->hasFechaHoraImportado() ? $entrada->getFechaHoraImportado() : '?';
    }

    public static function fecha(Entrada $entrada)
    {
        return $entrada->hasFechaImportado() ? $entrada->getFechaImportado() : '?';
    }

    public static function hora(Entrada $entrada)
    {
        return $entrada->hasHoraImportado() ? $entrada->getHoraImportado() : '?';
    }

    public static function vehiculo(Entrada $entrada)
    {
        return $entrada->hasVehiculo() ? $entrada->vehiculo->nombre : '?';
    }

    public static function conductor(Entrada $entrada)
    {
        return $entrada->hasVehiculo() ? $entrada->conductor->nombre : '?';
    }

    public static function numero_cruce(Entrada $entrada)
    {
        return $entrada->numero_cruce ?? '?';
    }
}
