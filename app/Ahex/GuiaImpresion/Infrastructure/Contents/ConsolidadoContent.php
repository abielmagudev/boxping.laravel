<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\Contents;

use App\Entrada;

class ConsolidadoContent extends Content
{
    protected static $actions_labels = [
        'numero' => [
            'large' => 'Número de consolidado',
            'small' => 'Consolidado',
        ],
        'status' => [
            'large' => 'Status del consolidado',
            'small' => 'Consolidado Status',
        ],
        'tarimas' => [
            'large' => 'Cantidad de tarimas del consolidado',
            'small' => 'Tarimas',
        ],
        'notas' => [
            'large' => 'Notas del consolidado',
            'small' => 'Consolidado Notas',
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
