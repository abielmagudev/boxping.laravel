<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class ClienteInformant extends Informant
{
    protected static $actions_labels = [
        'nombre' => [
            'large' => 'Nombre del cliente',
            'small' => 'Cliente Nombre',
        ],
        'alias' => [
            'large' => 'Alias del cliente',
            'small' => 'Cliente Alias',
        ],
        'contacto' => [
            'large' => 'Contacto del cliente',
            'small' => 'Cliente Contacto',
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
