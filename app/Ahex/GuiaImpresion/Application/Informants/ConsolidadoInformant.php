<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class ConsolidadoInformant extends Informant
{
    protected static $actions_descriptions = [
        'numero' => [
            'completa' => 'Número de consolidado',
            'minima' => 'Consolidado',
        ],
        'status' => [
            'completa' => 'Status del consolidado',
            'minima' => 'Consolidado(status)',
        ],
        'tarimas' => [
            'completa' => 'Cantidad de tarimas del consolidado',
            'minima' => 'Consolidado(tarimas)',
        ],
        'notas' => [
            'completa' => 'Notas del consolidado',
            'minima' => 'Consolidado(notas)',
        ]
    ];
    
    public static function numero(Entrada $entrada)
    {
        return $entrada->hasConsolidado() ? $entrada->consolidado->numero : 'Sin consolidado';
    }

    public static function status(Entrada $entrada)
    {
        return $entrada->hasConsolidado() ? $entrada->consolidado->status : '';
    }

    public static function tarimas(Entrada $entrada)
    {
        return $entrada->hasConsolidado() ? $entrada->consolidado->tarimas : '';
    }

    public static function notas(Entrada $entrada)
    {
        return $entrada->hasConsolidado() ? $entrada->consolidado->notas : '';
    }
}
