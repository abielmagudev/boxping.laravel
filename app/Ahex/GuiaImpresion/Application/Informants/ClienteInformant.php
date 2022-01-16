<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class ClienteInformant extends Informant
{
    protected static $actions_descriptions = [
        'nombre_alias' => [
            'completa' => 'Nombre y alias del cliente',
            'minima' => 'Cliente',
        ],
        'nombre' => [
            'completa' => 'Nombre del cliente',
            'minima' => 'Cliente(nombre)',
        ],
        'alias' => [
            'completa' => 'Alias del cliente',
            'minima' => 'Cliente(alias)',
        ],
        'contacto' => [
            'completa' => 'Información del contacto del cliente',
            'minima' => 'Cliente(contactar)',
        ],
        'contacto_nombre' => [
            'completa' => 'Nombre del contacto del cliente',
            'minima' => 'Cliente(contacto)',
        ],
        'telefono' => [
            'completa' => 'Teléfono del cliente',
            'minima' => 'Cliente(teléfono)',
        ],
        'correo_electronico' => [
            'completa' => 'Correo electrónico del cliente',
            'minima' => 'Cliente(email)',
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
