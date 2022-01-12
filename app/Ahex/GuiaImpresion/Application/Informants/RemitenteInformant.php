<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class RemitenteInformant extends Informant
{
    protected static $actions_labels = [
        'informacion' => [
            'large' => 'Información completa del remitente (Excepto notas)',
            'small' => 'Remitente',
        ],
        'domicilio' => [
            'large' => 'Domicilio del remitente (Calle, número y código postal)',
            'small' => 'Remitente Dirección',
        ],
        'postal' => [
            'large' => 'Código postal del remitente',
            'small' => 'Remitente Postal',
        ],
        'localidad' => [
            'large' => 'Localidad del remitente (Ciudad, estado y pais)',
            'small' => 'Remitente Localidad',
        ],
        'telefono' => [
            'large' => 'Telefóno(s) del remitente',
            'small' => 'Remitente Teléfono',
        ],
        'notas' => [
            'large' => 'Notas del remitente',
            'small' => 'Remitente Notas',
        ],
    ];

    public static function informacion(Entrada $entrada)
    {
        return ! $entrada->hasRemitente() ?: $entrada->remitente->informacion_completa;
    }

    public static function domicilio(Entrada $entrada)
    {
        return ! $entrada->hasRemitente() ?: $entrada->remitente->domicilio_completo;
    }

    public static function postal(Entrada $entrada)
    {
        return ! $entrada->hasRemitente() ?: $entrada->remitente->postal;
    }

    public static function localidad(Entrada $entrada)
    {
        return ! $entrada->hasRemitente() ?: $entrada->remitente->localidad;
    }

    public static function telefono(Entrada $entrada)
    {
        return ! $entrada->hasRemitente() ?: $entrada->remitente->telefono;
    }

    public static function notas(Entrada $entrada)
    {
        return ! $entrada->hasRemitente() ?: $entrada->remitente->notas;
    }
}
