<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class ConsolidadoInformant extends Informant
{
    protected static $tags = [
        'numero' => [
            'complete' => 'Número de consolidado',
            'compact' => 'Consolidado',
        ],
        'status' => [
            'complete' => 'Status del consolidado',
            'compact' => 'Consolidado(status)',
        ],
        'tarimas' => [
            'complete' => 'Cantidad de tarimas del consolidado',
            'compact' => 'Consolidado(tarimas)',
        ],
        'notas' => [
            'complete' => 'Notas del consolidado',
            'compact' => 'Consolidado(notas)',
        ]
    ];
    
    public static function numero(Entrada $entrada)
    {
        return $entrada->hasConsolidado() ? $entrada->consolidado->numero : 'Sin consolidado';
    }

    public static function status(Entrada $entrada)
    {
        return $entrada->hasConsolidado() ? ucfirst($entrada->consolidado->status) : 'X';
    }

    public static function tarimas(Entrada $entrada)
    {
        return $entrada->hasConsolidado() ? $entrada->consolidado->tarimas : 'X';
    }

    public static function notas(Entrada $entrada)
    {
        return $entrada->hasConsolidado() ? $entrada->consolidado->notas : '';
    }
}
