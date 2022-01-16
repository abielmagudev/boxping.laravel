<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class DestinatarioInformant extends Informant
{
    protected static $actions_descriptions = [
        'informacion' => [
            'completa' => 'Información del destinatario (excepto notas)',
            'minima' => 'Destinatario',
        ],
        'nombre' => [
            'completa' => 'Nombre del destinatario',
            'minima' => 'Destinatario(nombre)',
        ],
        'domicilio' => [
            'completa' => 'Domicilio del destinatario (calle, número y código postal)',
            'minima' => 'Destinatario(domicilio)',
        ],
        'direccion' => [
            'completa' => 'Direccion del destinatario (calle y número)',
            'minima' => 'Destinatario(dirección)',
        ],
        'postal' => [
            'completa' => 'Código postal del destinatario',
            'minima' => 'Destinatario(postal)',
        ],
        'localidad' => [
            'completa' => 'Localidad del destinatario (ciudad, estado y pais)',
            'minima' => 'Destinatario(localidad)',
        ],
        'referencias' => [
            'completa' => 'Referencias del destinatario',
            'minima' => 'Destinatario(referencias)',
        ],
        'telefono' => [
            'completa' => 'Telefóno(s) del destinatario',
            'minima' => 'Destinatario(teléfono)',
        ],
        'notas' => [
            'completa' => 'Notas del destinatario',
            'minima' => 'Destinatario(notas)',
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
