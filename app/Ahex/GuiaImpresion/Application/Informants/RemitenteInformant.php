<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class RemitenteInformant extends Informant
{
    protected static $actions_descriptions = [
        'informacion' => [
            'completa' => 'Información del remitente (excepto notas)',
            'minima' => 'Remitente',
        ],
        'nombre' => [
            'completa' => 'Nombre del remitente',
            'minima' => 'Remitente(nombre)',
        ],
        'domicilio' => [
            'completa' => 'Domicilio del remitente (calle, número y código postal)',
            'minima' => 'Remitente(domicilio)',
        ],
        'direccion' => [
            'completa' => 'Dirección del remitente (calle y número)',
            'minima' => 'Remitente(dirección)',
        ],
        'postal' => [
            'completa' => 'Código postal del remitente',
            'minima' => 'Remitente(postal)',
        ],
        'localidad' => [
            'completa' => 'Localidad del remitente (ciudad, estado y pais)',
            'minima' => 'Remitente(localidad)',
        ],
        'telefono' => [
            'completa' => 'Telefóno(s) del remitente',
            'minima' => 'Remitente(teléfono)',
        ],
        'notas' => [
            'completa' => 'Notas del remitente',
            'minima' => 'Remitente(notas)',
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
