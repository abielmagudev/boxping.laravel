<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Entrada;

class EtapaTareasInformant extends Informant
{
    protected static $title = 'Tareas (Seleccionar la etapa previamente)';

    protected static $tags = [
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
        'cantidad' => [
            'complete' => 'Cantidad de artículos en la caja',
            'compact' => 'Articulos(caja)',
        ],
    ];

    public static function etapa()
    {
        $etapas = EtapaInformant::etapas();
        return end( $etapas );
    }

    public static function validateEtapa(string $tarea)
    {
        return self::etapa()->isReal() && self::etapa()->hasTarea($tarea);
    }

    public static function pesaje(Entrada $entrada)
    {
        if(! self::validateEtapa('pesaje') )
            return '...pesaje?';

        return $entrada->etapas()->find(self::etapa()->id)->entrada_etapa->lectura_pesaje ?? 'Sin pesaje';
    }

    public static function volumen(Entrada $entrada)
    {
        if(! self::validateEtapa('volumen') )
            return '...volúmen?';

        return $entrada->etapas()->find(self::etapa()->id)->entrada_etapa->lectura_volumen ?? 'Sin volúmen';
    }

    public static function pesaje_volumen(Entrada $entrada)
    {
        return self::pesaje($entrada) . ' / ' . self::volumen($entrada);
    }

    public static function cantidad_articulos(Entrada $entrada)
    {
        return 'Cantidad de articulos';
    }
}
