<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class ConsolidadoInformant extends Informant
{
    protected static $actions_labels = [
        'numero' => [
            'completa' => 'Número de consolidado',
            'compacta' => 'Consolidado',
        ],
        'status' => [
            'completa' => 'Status del consolidado',
            'compacta' => 'Consolidado(status)',
        ],
        'tarimas' => [
            'completa' => 'Cantidad de tarimas del consolidado',
            'compacta' => 'Consolidado(tarimas)',
        ],
        'notas' => [
            'completa' => 'Notas del consolidado',
            'compacta' => 'Consolidado(notas)',
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
