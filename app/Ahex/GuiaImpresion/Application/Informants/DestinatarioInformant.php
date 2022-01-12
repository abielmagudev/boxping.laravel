<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class DestinatarioInformant extends Informant
{
    protected static $actions_labels = [
        'informacion' => [
            'large' => 'Información completa del destinatario (Excepto notas)',
            'small' => 'Destinatario',
        ],
        'domicilio' => [
            'large' => 'Domicilio del destinatario (Calle, número y código postal)',
            'small' => 'Destinatario Dirección',
        ],
        'postal' => [
            'large' => 'Código postal del destinatario',
            'small' => 'Destinatario Postal',
        ],
        'localidad' => [
            'large' => 'Localidad del destinatario (Ciudad, estado y pais)',
            'small' => 'Destinatario Localidad',
        ],
        'referencias' => [
            'large' => 'Referencias del destinatario',
            'small' => 'Destinatario Referencias',
        ],
        'telefono' => [
            'large' => 'Telefóno(s) del destinatario',
            'small' => 'Destinatario Teléfono',
        ],
        'notas' => [
            'large' => 'Notas del destinatario',
            'small' => 'Destinatario Notas',
        ],
    ];
    
    public static function informacion(Entrada $entrada)
    {
        return ! $entrada->hasDestinatario() ?: $entrada->destinatario->informacion_completa;
    }

    public static function domicilio(Entrada $entrada)
    {
        return ! $entrada->hasDestinatario() ?: $entrada->destinatario->domicilio_completo;
    }

    public static function postal(Entrada $entrada)
    {
        return ! $entrada->hasDestinatario() ?: $entrada->destinatario->postal;
    }

    public static function localidad(Entrada $entrada)
    {
        return ! $entrada->hasDestinatario() ?: $entrada->destinatario->localidad;
    }

    public static function referencias(Entrada $entrada)
    {
        return ! $entrada->hasDestinatario() ?: $entrada->destinatario->referencias;
    }

    public static function telefono(Entrada $entrada)
    {
        return ! $entrada->hasDestinatario() ?: $entrada->destinatario->telefono;
    }

    public static function notas(Entrada $entrada)
    {
        return ! $entrada->hasDestinatario() ?: $entrada->destinatario->notas;
    }
}
