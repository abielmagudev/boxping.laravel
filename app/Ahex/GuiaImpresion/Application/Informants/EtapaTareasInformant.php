<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class EtapaTareasInformant extends Informant
{
    protected static $tags = [
        'contenido' => [
            'complete' => 'Contenido de la caja',
            'compact' => 'Contenido(caja)',
        ],
        'pesaje' => [
            'complete' => 'Pesaje de la caja',
            'compact' => 'Pesaje(caja)',
        ],
        'volumen' => [
            'complete' => 'Volúmen de la caja',
            'compact' => 'Volúmen(caja)',
        ],
        'pesaje_volumen' => [
            'complete' => 'Pesaje y volúmen de la caja',
            'compact' => 'Medidas(caja)',
        ],
    ];

    public static function contenido(Entrada $entrada)
    {
        return 'Contenido de la caja en la etapa';
    }

    public static function pesaje(Entrada $entrada)
    {
        return 'Pesaje de la caja en la etapa';
    }

    public static function volumen(Entrada $entrada)
    {
        return 'Volúmen de la caja en la etapa';
    }

    public static function pesaje_volumen(Entrada $entrada)
    {
        return 'Pesaje y volúmen de la caja en la etapa';
    }
}
