<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class EtapaTareasInformant extends Informant
{
    protected static $actions_descriptions = [
        'contenido' => [
            'completa' => 'Contenido de la caja',
            'minima' => 'Contenido(caja)',
        ],
        'pesaje' => [
            'completa' => 'Pesaje de la caja',
            'minima' => 'Pesaje(caja)',
        ],
        'volumen' => [
            'completa' => 'Volúmen de la caja',
            'minima' => 'Volúmen(caja)',
        ],
        'pesaje_volumen' => [
            'completa' => 'Pesaje y volúmen de la caja',
            'minima' => 'Medidas(caja)',
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
