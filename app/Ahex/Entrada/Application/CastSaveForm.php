<?php 

namespace App\Ahex\Entrada\Application;

use App\Entrada;
use App\Consolidado;
use App\Cliente;
use App\Codigor;
use App\Reempacador;
use App\Vehiculo;
use App\Conductor;

Abstract class CastSaveForm
{
    public static function create($consolidado_id)
    {
        if(! $consolidado_id )
            return self::createWithoutConsolidado();
            
        return self::createWithConsolidado($consolidado_id);
    }

    public static function createWithoutConsolidado()
    {
        return array(
            'template' => 'sin-consolidado',
            'entrada'  => new Entrada,
            'clientes' => Cliente::all(),
            'goback'   => route('entradas.index'), 
        );
    }

    public static function createWithConsolidado($consolidado_id)
    {
        return array(
            'template'    => 'consolidado',     
            'entrada'     => new Entrada,
            'consolidado' => Consolidado::find($consolidado_id),
            'goback'      => route('consolidados.show', $consolidado_id),
        );
    }

    public static function edit($form, $entrada)
    {        
        switch($form)
        {
            case 'reempaque':
                return self::editReempaque($entrada);
                break;

            case 'importacion':
                return self::editImportacion($entrada);
                break;

            default:
                return self::editEntrada($entrada);
        }
    }

    public static function editReempaque($entrada)
    {
        return array(
            'template' => 'reempaque',
            'entrada' => $entrada,
            'codigosr' => Codigor::all(),
            'reempacadores' => Reempacador::all(),
        );
    }

    public static function editImportacion($entrada)
    {
        return array(
            'template' => 'importacion',
            'entrada' => $entrada,
            'vehiculos' => Vehiculo::all(),
            'conductores' => Conductor::all(),
        );
    }
    
    public static function editEntrada($entrada)
    {
        return array(
            'template' => 'entrada',
            'entrada' => $entrada,
            'consolidado' => $entrada->consolidado,
            'clientes' => Cliente::all(['id','nombre','alias']),
        );
    }
}
