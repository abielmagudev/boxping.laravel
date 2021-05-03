<?php

namespace App\Ahex\Printing\Application;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Entrada;
use App\Consolidado;
use App\Cliente;
use App\Remitente;
use App\Destinatario;
use App\Conductor;
use App\Vehiculo;
use App\Reempacador;
use App\Codigor;
use App\Salida;

class EntradaSheet extends SheetBase
{
    protected $default_sheet = 'informacion';

    protected function informacion()
    {
        return [
            'entrada'      => $this->model,
            'consolidado'  => $this->model->consolidado ?? new Consolidado,
            'cliente'      => $this->model->cliente ?? new Cliente,
            'remitente'    => $this->model->remitente ?? new Remitente,
            'destinatario' => $this->model->destinatario ?? new Destinatario,
            'conductor'    => $this->model->conductor ?? new Conductor,
            'vehiculo'     => $this->model->vehiculo ?? new Vehiculo,
            'reempacador'  => $this->model->reempacador ?? new Reempacador,
            'codigor'      => $this->model->codigor ?? new Codigor,
            'salida'       => $this->model->salida ?? new Salida,
            'template'     => TrayManager::template('entrada'),
        ];
    }

    protected function etiqueta()
    {
        return [
            'entrada'      => $this->model,
            'ultima_etapa' => $this->model->ultimaEtapa(),
            'destinatario' => $this->model->destinatario ?? new Destinatario,
            'salida'       => $this->model->salidaForzada(),
            'template'     => TrayManager::template('etiqueta'),
        ];
    }

    protected function etapas()
    {
        return [
            'entrada'  => $this->model,
            'etapas'   => $this->model->etapas()->get(),
            'template' => TrayManager::template('etapas'),
        ];
    }

    /**
     * 
     * Retorna una collection de entradas-sheet, casos como las entradas de consolidado
     * O un filtrado de entradas, que requieren un layout multiple
     * 
     * Argument one: Instance Request
     * Argument two: Instance Collection or array models id
     * Argument three: Specific method(sheet) for each entrada
     * 
     * @return array collection
     * 
     */
    public static function collection(Collection $list, Request $request)
    {
        $entradas  = static::filterEntradasCollection($list);
        $collected = array();
            
        foreach($entradas as $entrada)
        {
            array_push($collected, self::build($entrada, $request));
        }

        return $collected;
    }


    /**
     * 
     * Retorna una collection de los modelos...
     * 
     * 1. Si es una collection, filtra los elementos que son modelo Entrada y retorna collection
     * 2. Si es una array, busca los ids para retornar una collection de Entradas
     * 3. Retorna una collection vacia
     * 
     * @return collection Entradas | Empty collection
     * 
     */
    public static function filterEntradasCollection($list)
    {
        if( $list instanceof Collection )
        {
            return $list->filter( function ($item, $index) {
                return $item instanceof Entrada;
            });
        }

        return collect([]);
    }
}
