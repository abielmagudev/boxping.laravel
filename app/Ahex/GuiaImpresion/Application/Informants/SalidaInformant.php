<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class SalidaInformant extends Informant
{
    protected static $title = 'Salida';

    protected static $tags = [
        'transportadora' => [
            'complete' => 'Nombre de la transportadora',
            'compact' => 'Salida(transportadora)',
        ],
        'rastreo' => [
            'complete' => 'Número de rastreo',
            'compact' => 'Salida(rastreo)',
        ],
        'confirmacion' => [
            'complete' => 'Número de confirmación',
            'compact' => 'Salida(confirmación)',
        ],
        'status' => [
            'complete' => 'Status de salida',
            'compact' => 'Salida(status)',
        ],
        'cobertura' => [
            'complete' => 'Tipo de cobertura',
            'compact' => 'Salida(cobertura)',
        ],
        'domicilio' => [
            'complete' => 'Domicilio del destinatario ó cobertura: ocurre',
            'compact' => 'Salida(destinatario ú ocurre)',
        ],
        'ocurre' => [
            'complete' => 'Información de cobertura: ocurre',
            'compact' => 'Salida(ocurre)',
        ],
        'incidentes' => [
            'complete' => 'Incidentes en la transportadora',
            'compact' => 'Salida(incidentes)',
        ],
        'notas' => [
            'complete' => 'Notas de salida',
            'compact' => 'Salida(notas)',
        ],
    ];

    public static function transportadora(Entrada $entrada)
    {
        return $entrada->hasSalida() && $entrada->salida->hasTransportadora() ? $entrada->salida->transportadora->nombre : '?';
    }

    public static function rastreo(Entrada $entrada)
    {
        return $entrada->hasSalida() && $entrada->salida->hasRastreo() ? $entrada->salida->rastreo : '?';
    }

    public static function confirmacion(Entrada $entrada)
    {
        return $entrada->hasSalida() && $entrada->salida->hasConfirmacion() ? $entrada->salida->confirmacion : '?';
    }

    public static function status(Entrada $entrada)
    {
        return $entrada->hasSalida() ? $entrada->salida->status_titulo : '?';
    }

    public static function cobertura(Entrada $entrada)
    {
        return $entrada->hasSalida() && $entrada->salida->hasCobertura() ? $entrada->salida->cobertura_titulo : '?';
    }

    public static function domicilio(Entrada $entrada)
    {
        if( $entrada->hasSalida() && $entrada->salida->hasCobertura('ocurre') )
            return $entrada->salida->domicilio_ocurre;

        if( $entrada->hasDestinatario() )
            return $entrada->destinatario->domicilio_completo;

        return '?';
    }

    public static function ocurre(Entrada $entrada)
    {
        return $entrada->hasSalida() && $entrada->salida->hasCobertura('ocurre') ? $entrada->salida->domicilio_ocurre : '?';
    }

    public static function incidentes(Entrada $entrada)
    {
        return $entrada->hasSalida() && $entrada->salida->hasIncidentes() ? $entrada->salida->getListaIncidentes() : 'Ninguno';
    }

    public static function notas(Entrada $entrada)
    {
        return $entrada->hasSalida() ? $entrada->salida->notas : '';
    }
}
