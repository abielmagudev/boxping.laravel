<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class SalidaInformant extends Informant
{
    protected static $actions_labels = [
        'transportadora' => [
            'completa' => 'Nombre de la transportadora',
            'compacta' => 'Transportadora)',
        ],
        'rastreo' => [
            'completa' => 'Número de rastreo',
            'compacta' => 'Rastreo',
        ],
        'confirmacion' => [
            'completa' => 'Número de confirmación',
            'compacta' => 'Confirmación',
        ],
        'status' => [
            'completa' => 'Status de salida',
            'compacta' => 'Salida(status)',
        ],
        'cobertura' => [
            'completa' => 'Tipo de cobertura',
            'compacta' => 'Cobertura',
        ],
        'ocurre' => [
            'completa' => 'Información completa de cobertura "Ocurre"',
            'compacta' => 'Ocurre',
        ],
        'incidentes' => [
            'completa' => 'Incidentes de salida',
            'compacta' => 'Salida(incidentes)',
        ],
        'notas' => [
            'completa' => 'Notas de salida',
            'compacta' => 'Salida(notas)',
        ],
    ];

    public static function transportadora(Entrada $entrada)
    {
        return ! $entrada->hasSalida() ||! $entrada->salida->hasTransportadora() ?: $entrada->salida->transportadora->nombre;
    }

    public static function rastreo(Entrada $entrada)
    {
        return ! $entrada->hasSalida() ?: $entrada->salida->rastreo;
    }

    public static function confirmacion(Entrada $entrada)
    {
        return ! $entrada->hasSalida() ?: $entrada->salida->confirmacion;
    }

    public static function status(Entrada $entrada)
    {
        return ! $entrada->hasSalida() ?: $entrada->salida->status;
    }

    public static function cobertura(Entrada $entrada)
    {
        return ! $entrada->hasSalida() ?: $entrada->salida->cobertura;
    }

    public static function ocurre(Entrada $entrada)
    {
        return ! $entrada->hasSalida() ?: $entrada->salida->domicilio_ocurre;
    }

    public static function incidentes(Entrada $entrada)
    {
        return ! $entrada->hasSalida() ||! $entrada->salida->hasIncidentes() ?: $entrada->salida->getListaIncidentes();
    }

    public static function notas(Entrada $entrada)
    {
        return ! $entrada->hasSalida() ?: $entrada->salida->notas;
    }
}
