<?php

namespace App\Ahex\Printing\Application;

use Illuminate\Database\Eloquent\Collection;
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
    protected static $collected = [];

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
            'template'     => 'printing.templates.entrada',
        ];
    }

    protected function etiqueta()
    {
        return [
            'entrada'      => $this->model,
            'ultima_etapa' => $this->model->ultimaEtapa(),
            'destinatario' => $this->model->destinatario ?? new Destinatario,
            'salida'       => $this->model->salidaForzada(),
            'template'     => 'printing.templates.etiqueta',
        ];
    }

    protected function etapas()
    {
        return [
            'entrada'  => $this->model,
            'etapas'   => $this->model->etapas()->get(),
            'template' => 'printing.templates.etapas',
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
    public static function collection($request, $models, $sheet = null)
    {
        $request    = static::setCollectionSheet($request, $sheet);
        $collection = static::getCollectionModel($models);
            
        foreach($collection as $item)
        {
            if($item instanceof Entrada)
                array_push(static::$collected, new static($request, $item));
        }

        return static::$collected;
    }

    /**
     * 
     * Define la hoja solicitada para cada instancia de EntradaSheet
     * Modificando la peticion inicial para las proximas instancias
     * 
     * Ejemplo: ConsolidadoSheet -> request -> hoja=etiquetas: Solicita la impresion de etiqueta de las entradas
     *          PERO, hoja=etiquetas no existe en EntradaSheet, por eso se especifica en el parametro sheet
     *          la hoja de "etiqueta" para hacer la instancia con la hoja correspondiente.
     * 
     * @return request modified
     * 
     */
    private static function setCollectionSheet($request, $sheet)
    {
        if( is_string($sheet) && method_exists(__CLASS__, $sheet) )
            $request->merge(['hoja' => $sheet]);

        return $request;
    }

    /**
     * 
     * Retorna una collection de los modelos...
     * 
     * Si ya estan modelados, retorna la collection
     * Si es una array de ids, busca e instancia los modelos en collecion
     * Si no, regresa una collection vacia...
     * 
     * @return collection Entradas | Avoid
     * 
     */
    private static function getCollectionModel($models)
    {
        if( $models instanceof Collection )
            return $models;

        if( is_array($models) )
            return Entrada::whereIn('id', $models)->get();

        return collect([]);
    }
}
