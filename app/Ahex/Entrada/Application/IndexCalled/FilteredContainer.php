<?php

namespace App\Ahex\Entrada\Application\IndexCalled;

abstract class FilteredContainer
{
    protected static $filtered = [
        'ambito' => Filtered\AmbitoFiltered::class,
        'cliente' => Filtered\ClienteFiltered::class,
        'codigor' => Filtered\CodigorFiltered::class,
        'conductor' => Filtered\ConductorFiltered::class,
        'destinatario' => Filtered\DestinatarioFiltered::class,
        'etapa' => Filtered\EtapaFiltered::class,
        'mostrar' => Filtered\MostrarFiltered::class,
        'numero' => Filtered\NumeroFiltered::class,
        'reempacador' => Filtered\ReempacadorFiltered::class,
        'remitente' => Filtered\RemitenteFiltered::class,
        'salida' => Filtered\SalidaFiltered::class,
        'tiempo' => Filtered\TiempoFiltered::class,
        'vehiculo' => Filtered\VehiculoFiltered::class,
    ];

    public static function exists(string $filter)
    {
        return isset( self::$filtered[$filter] );
    }

    public static function classname(string $filter)
    {
        return self::$filtered[$filter];
    }
}
