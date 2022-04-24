<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class DestinatarioInformant extends Informant
{
    protected static $tags = [
        'informacion' => [
            'complete' => 'Información del destinatario (excepto notas)',
            'compact' => 'Destinatario',
        ],
        'nombre' => [
            'complete' => 'Nombre del destinatario',
            'compact' => 'Destinatario(nombre)',
        ],
        'domicilio' => [
            'complete' => 'Domicilio del destinatario (calle, número y código postal)',
            'compact' => 'Destinatario(domicilio)',
        ],
        'direccion' => [
            'complete' => 'Direccion del destinatario (calle y número)',
            'compact' => 'Destinatario(dirección)',
        ],
        'postal' => [
            'complete' => 'Código postal del destinatario',
            'compact' => 'Destinatario(postal)',
        ],
        'localidad' => [
            'complete' => 'Localidad del destinatario (ciudad, estado y pais)',
            'compact' => 'Destinatario(localidad)',
        ],
        'referencias' => [
            'complete' => 'Referencias del destinatario',
            'compact' => 'Destinatario(referencias)',
        ],
        'telefono' => [
            'complete' => 'Telefóno(s) del destinatario',
            'compact' => 'Destinatario(teléfono)',
        ],
        'notas' => [
            'complete' => 'Notas del destinatario',
            'compact' => 'Destinatario(notas)',
        ],
    ];
    
    public static function informacion(Entrada $entrada)
    {
        return $entrada->hasDestinatario() ? $entrada->destinatario->nombre . '<br>' . $entrada->destinatario->informacion_completa : 'Sin destinatario';
    }

    public static function nombre(Entrada $entrada)
    {
        return $entrada->hasDestinatario() ? $entrada->destinatario->nombre : '?';
    }

    public static function domicilio(Entrada $entrada)
    {
        return $entrada->hasDestinatario() ? $entrada->destinatario->domicilio_completo : '?';
    }

    public static function direccion(Entrada $entrada)
    {
        return $entrada->hasDestinatario() ? $entrada->destinatario->direccion : '?';
    }

    public static function postal(Entrada $entrada)
    {
        return $entrada->hasDestinatario() ? $entrada->destinatario->postal : '?';
    }

    public static function localidad(Entrada $entrada)
    {
        return $entrada->hasDestinatario() ? $entrada->destinatario->localidad : '?';
    }

    public static function referencias(Entrada $entrada)
    {
        return $entrada->hasDestinatario() ? $entrada->destinatario->referencias : '?';
    }

    public static function telefono(Entrada $entrada)
    {
        return $entrada->hasDestinatario() ? $entrada->destinatario->telefono : '?';
    }

    public static function notas(Entrada $entrada)
    {
        return $entrada->hasDestinatario() ? $entrada->destinatario->notas : '';
    }
}
