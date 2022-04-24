<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class RemitenteInformant extends Informant
{
    protected static $tags = [
        'informacion' => [
            'complete' => 'Información del remitente (excepto notas)',
            'compact' => 'Remitente',
        ],
        'nombre' => [
            'complete' => 'Nombre del remitente',
            'compact' => 'Remitente(nombre)',
        ],
        'domicilio' => [
            'complete' => 'Domicilio del remitente (calle, número y código postal)',
            'compact' => 'Remitente(domicilio)',
        ],
        'direccion' => [
            'complete' => 'Dirección del remitente (calle y número)',
            'compact' => 'Remitente(dirección)',
        ],
        'postal' => [
            'complete' => 'Código postal del remitente',
            'compact' => 'Remitente(postal)',
        ],
        'localidad' => [
            'complete' => 'Localidad del remitente (ciudad, estado y pais)',
            'compact' => 'Remitente(localidad)',
        ],
        'telefono' => [
            'complete' => 'Telefóno(s) del remitente',
            'compact' => 'Remitente(teléfono)',
        ],
        'notas' => [
            'complete' => 'Notas del remitente',
            'compact' => 'Remitente(notas)',
        ],
    ];

    public static function informacion(Entrada $entrada)
    {
        return $entrada->hasRemitente() ? $entrada->remitente->nombre . '<br>' .$entrada->remitente->informacion_completa : 'Sin remitente';
    }

    public static function nombre(Entrada $entrada)
    {
        return $entrada->hasRemitente() ? $entrada->remitente->nombre : '?';
    }

    public static function domicilio(Entrada $entrada)
    {
        return $entrada->hasRemitente() ? $entrada->remitente->domicilio_completo : '?';
    }

    public static function direccion(Entrada $entrada)
    {
        return $entrada->hasRemitente() ? $entrada->remitente->direccion : '?';
    }

    public static function postal(Entrada $entrada)
    {
        return $entrada->hasRemitente() ? $entrada->remitente->postal : '?';
    }

    public static function localidad(Entrada $entrada)
    {
        return $entrada->hasRemitente() ? $entrada->remitente->localidad : '?';
    }

    public static function telefono(Entrada $entrada)
    {
        return $entrada->hasRemitente() ? $entrada->remitente->telefono : '?';
    }

    public static function notas(Entrada $entrada)
    {
        return $entrada->hasRemitente() ? $entrada->remitente->notas : '';
    }
}
