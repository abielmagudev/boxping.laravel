<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class ClienteInformant extends Informant
{
    protected static $actions_labels = [
        'nombre' => [
            'completa' => 'Nombre del cliente',
            'compacta' => 'Cliente',
        ],
        'alias' => [
            'completa' => 'Alias del cliente',
            'compacta' => 'Cliente(alias)',
        ],
        'contacto' => [
            'completa' => 'Contacto del cliente',
            'compacta' => 'Cliente(contacto)',
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
