<?php 

namespace App\Ahex\GuiaImpresion\Domain;

trait PageContent
{
    public static function allPageContents()
    {
        return [
            'entrada' => self::getEntradaContent(),
            'salida' => self::getSalidaContent(),
            'etapas' => self::getEtapasContent(),
        ];
    }

    public static function getEntradaContent()
    {
        return [
            'numero' => 'Número de entrada',
            'cliente' => 'Nombre del cliente',
            'consolidado' => 'Número del consolidado',
            'contenido' => 'Contenido de la entrada',
            'importado' => 'Fecha y número de cruce de importado',
            'importado_cruce' => 'Número de cruce',
            'importado_fecha' => 'Fecha de importado',
            'reempacado' => 'Fecha y descripción de reempacado',
            'reempacado_descripcion' => 'Descripción de reempacado',
            'reempacado_fecha' => 'Fecha de reempacado',
            'remitente' => 'Información del remitente',
            'destinatario' => 'Información del destinatario',
        ];
    }

    public static function getSalidaContent()
    {
        return [
            'transportadora' => 'Nombre de la transportadora',
            'rastreo' => 'Número de rastreo',
            'confirmacion' => 'Número de confirmación',
            'status' => 'Status de salida',
            'cobertura' => 'Tipo de cobertura',
            'incidentes' => 'Incidentes de salida',
            'salida_notas' => 'Notas de salida',
        ];
    }

    public static function getEtapasContent()
    {        
        if(! $etapas = \App\Etapa::all() )
            return [];

        foreach($etapas as $etapa) 
            $attributes[$etapa->slug] = $etapa->nombre;

        return $attributes;
    }
}
