<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class ClienteInformant extends Informant
{
    protected static $actions_descriptions = [
        'nombre' => [
            'completa' => 'Nombre del cliente',
            'minima' => 'Cliente',
        ],
        'alias' => [
            'completa' => 'Alias del cliente',
            'minima' => 'Cliente(alias)',
        ],
        'contacto' => [
            'completa' => 'Contacto del cliente',
            'minima' => 'Cliente(contacto)',
        ],
    ];

    public static function nombre(Entrada $entrada)
    {
        return $entrada->hasCliente() ? $entrada->cliente->nombre : '';
    }

    public static function alias(Entrada $entrada)
    {
        return $entrada->hasCliente() ? $entrada->cliente->alias : '';
    }

    public static function contacto(Entrada $entrada)
    {
        return $entrada->hasCliente() ? $entrada->cliente->contacto : '';
    }
}
