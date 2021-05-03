<?php

namespace App\Ahex\Printing\Application;

use App\Consolidado;
use App\Cliente;
use App\Entrada;
use App\Salida;

class ConsolidadoSheet extends SheetBase
{
    public $default_sheet = 'informacion';

    public function informacion()
    {
        return [
            'consolidado' => $this->model,
            'cliente'     => $this->model->cliente ?? new Cliente,
            'entradas'    => $this->model->entradas,
            'template'    => TrayManager::template('consolidado'),
        ];
    }

    /**
     * 
     * Remueve el input 'hoja' del request, 
     * Para que EntradaSheet ejecute el método por defualt_sheet
     * 
     * Example: $this->request->query->remove( 'field name' )
     * 
     */
    public function entradas()
    {
        $entradas = Entrada::whereIn('id', $this->request->lista)->get();
        $this->request->query->remove('hoja');

        return [
            'consolidado' => $this->model,
            'collection' => EntradaSheet::collection($entradas, $this->request),
        ];
    }

    /**
     * 
     * Reemplaza el valor del input 'hoja' del request, por el valor de 'etiqueta' en singular
     * Para que ejecute su metodo válido de EntradaSheet
     * 
     * Example: $this->request->merge(['field_name' => 'value'])
     */
    public function etiquetas()
    {
        $entradas = Entrada::whereIn('id', $this->request->lista)->get();
        $this->request->merge(['hoja' => 'etiqueta']);

        return [
            'consolidado' => $this->model,
            'collection' => EntradaSheet::collection($entradas, $this->request),
        ];
    }

    public function etapas()
    {        
        $entradas = Entrada::whereIn('id', $this->request->lista)->get();

        return [
            'consolidado' => $this->model,
            'collection' => EntradaSheet::collection($entradas, $this->request),
        ];
    }

    /**
     * 
     * Se valida si el parametro(sheetname) nombre de la hoja(metodo), para saber 
     * si retornara una collection o informacion separada como content el metodo a ejecutar
     * 
     * @return boolean
     * 
     */
    public static function isCollectionSheet($sheetname)
    {
        return in_array($sheetname, [
            'entradas',
            'etiquetas',
            'etapas',
        ]);
    }
}
