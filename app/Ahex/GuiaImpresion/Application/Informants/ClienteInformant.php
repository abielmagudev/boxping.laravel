<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class ClienteInformant extends Informant
{
    protected static $tags = [
        'nombre_alias' => [
            'complete' => 'Nombre y alias del cliente',
            'compact' => 'Cliente',
        ],
        'nombre' => [
            'complete' => 'Nombre del cliente',
            'compact' => 'Cliente(nombre)',
        ],
        'alias' => [
            'complete' => 'Alias del cliente',
            'compact' => 'Cliente(alias)',
        ],
        'contacto' => [
            'complete' => 'Información del contacto del cliente',
            'compact' => 'Cliente(contactar)',
        ],
        'contacto_nombre' => [
            'complete' => 'Nombre del contacto del cliente',
            'compact' => 'Cliente(contacto)',
        ],
        'telefono' => [
            'complete' => 'Teléfono del cliente',
            'compact' => 'Cliente(teléfono)',
        ],
        'correo_electronico' => [
            'complete' => 'Correo electrónico del cliente',
            'compact' => 'Cliente(email)',
        ],
    ];

    public static function nombre_alias(Entrada $entrada)
    {
        return self::nombre($entrada) .' ('. self::alias($entrada) . ')';
    }

    public static function nombre(Entrada $entrada)
    {
        return $entrada->hasCliente() ? $entrada->cliente->nombre : '?';
    }

    public static function alias(Entrada $entrada)
    {
        return $entrada->hasCliente() ? $entrada->cliente->alias : '?';
    }

    public static function contacto(Entrada $entrada)
    {
        return self::contacto_nombre($entrada) . ' / ' . self::telefono($entrada) . ' / ' . self::correo_electronico($entrada);
    }

    public static function contacto_nombre(Entrada $entrada)
    {
        return $entrada->hasCliente() ? $entrada->cliente->contacto : '?';
    }

    public static function telefono(Entrada $entrada)
    {
        return $entrada->hasCliente() ? $entrada->cliente->telefono : '?';
    }

    public static function correo_electronico(Entrada $entrada)
    {
        return $entrada->hasCliente() ? $entrada->cliente->correo_electronico : '?';
    }
}
