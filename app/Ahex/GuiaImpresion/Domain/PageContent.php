<?php 

namespace App\Ahex\GuiaImpresion\Domain;

trait PageContent
{
    public static function allPageContents()
    {
        return [
            'consolidado' => self::getConsolidadoContent(),
            'entrada' => self::getEntradaContent(),
            'salida' => self::getSalidaContent(),
            'etapas' => self::getEtapasContent(),
        ];
    }

    public static function getConsolidadoContent()
    {
        return [
            'numero' => 'Número',
            'status' => 'Status',
            'cliente' => 'Cliente',
            'graficas' => 'Gráficas',
            'notas' => 'Notas',
            'tarimas_count' => 'Contador de tarimas',
            'entradas_count' => 'Contador de entradas',
        ];
    }

    public static function getEntradaContent()
    {
        return [
            'numero' => 'Número',
            'cliente' => 'Cliente',
            'consolidado' => 'Consolidado',
            'contenido' => 'Contenido',
            'importado' => 'Importado',
            'importado_cruce' => 'Número de cruce',
            'importado_fecha' => 'Fecha de importado',
            'reempacado' => 'Reempacado',
            'reempacado_descripcion' => 'Descripción de reempacado',
            'reempacado_fecha' => 'Fecha de reempacado',
            'remitente' => 'Remitente',
            'destinatario' => 'Destinatario',
        ];
    }

    public static function getSalidaContent()
    {
        return [
            'rastreo' => 'Rastreo',
            'status' => 'Status',
            'transportadora' => 'Transportadora',
            'confirmacion' => 'Confirmación',
            'cobertura' => 'Cobertura',
            'incidentes' => 'Incidentes',
            'notas' => 'notas',
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
