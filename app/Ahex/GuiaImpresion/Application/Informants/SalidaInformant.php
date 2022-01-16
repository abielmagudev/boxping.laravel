<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class SalidaInformant extends Informant
{
    protected static $actions_descriptions = [
        'transportadora' => [
            'completa' => 'Nombre de la transportadora',
            'minima' => 'Salida(transportadora)',
        ],
        'rastreo' => [
            'completa' => 'Número de rastreo',
            'minima' => 'Salida(rastreo)',
        ],
        'confirmacion' => [
            'completa' => 'Número de confirmación',
            'minima' => 'Salida(confirmación)',
        ],
        'status' => [
            'completa' => 'Status de salida',
            'minima' => 'Salida(status)',
        ],
        'cobertura' => [
            'completa' => 'Tipo de cobertura',
            'minima' => 'Salida(cobertura)',
        ],
        'ocurre' => [
            'completa' => 'Información completa de cobertura "Ocurre"',
            'minima' => 'Salida(ocurre)',
        ],
        'incidentes' => [
            'completa' => 'Incidentes de salida',
            'minima' => 'Salida(incidentes)',
        ],
        'notas' => [
            'completa' => 'Notas de salida',
            'minima' => 'Salida(notas)',
        ],
    ];

    public static function transportadora(Entrada $entrada)
    {
        return $entrada->hasSalida() && $entrada->salida->hasTransportadora() ? $entrada->salida->transportadora->nombre : '?';
    }

    public static function rastreo(Entrada $entrada)
    {
        return $entrada->hasSalida() && isset($entrada->salida->rastreo) ? $entrada->salida->rastreo : '?';
    }

    public static function confirmacion(Entrada $entrada)
    {
        return $entrada->hasSalida() && isset($entrada->salida->confirmacion) ? $entrada->salida->confirmacion : '?';
    }

    public static function status(Entrada $entrada)
    {
        return $entrada->hasSalida() ? $entrada->salida->status : '?';
    }

    public static function cobertura(Entrada $entrada)
    {
        return $entrada->hasSalida() && $entrada->salida->hasCobertura() ? $entrada->salida->cobertura : '?';
    }

    public static function ocurre(Entrada $entrada)
    {
        return $entrada->hasSalida() && $entrada->salida->hasCobertura('ocurre') ? $entrada->salida->domicilio_ocurre : '?';
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
