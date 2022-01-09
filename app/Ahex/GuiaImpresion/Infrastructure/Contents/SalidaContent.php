<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\Contents;

use App\Entrada;

class SalidaContent extends Content
{
    protected static $actions_labels = [
        'transportadora' => [
            'large' => 'Nombre de la transportadora',
            'small' => 'Transportadora',
        ],
        'rastreo' => [
            'large' => 'Número de rastreo',
            'small' => 'Rastreo',
        ],
        'confirmacion' => [
            'large' => 'Número de confirmación',
            'small' => 'Confirmación',
        ],
        'status' => [
            'large' => 'Status de salida',
            'small' => 'Salida Status',
        ],
        'cobertura' => [
            'large' => 'Tipo de cobertura',
            'small' => 'Cobertura',
        ],
        'ocurre' => [
            'large' => 'Información completa de cobertura "Ocurre"',
            'small' => 'Ocurre',
        ],
        'incidentes' => [
            'large' => 'Incidentes de salida',
            'small' => 'Incidentes',
        ],
        'notas' => [
            'large' => 'Notas de salida',
            'small' => 'Salida Notas',
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
