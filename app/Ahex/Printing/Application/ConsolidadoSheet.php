<?php

namespace App\Ahex\Printing\Application;

use App\Consolidado;
use App\Cliente;
use App\Entrada;
use App\Salida;

class ConsolidadoSheet extends SheetBase
{
    public $default_sheet = 'informacion';

    protected $multiple_layout = [
        'entradas',
        'etiquetas',
        'etapas'
    ];

    public function informacion()
    {
        return [
            'consolidado' => $this->model,
            'cliente'     => $this->model->cliente ?? new Cliente,
            'entradas'    => $this->model->entradas,
            'template'    => 'printing.templates.consolidado',
        ];
    }

    public function entradas()
    {
        $entradas = $this->request->exists('lista') && is_array($this->request->lista) 
                    ? $this->request->lista
                    : $this->model->entradas;

        return [
            'consolidado' => $this->model,
            'collection' => EntradaSheet::collection($this->request, $entradas),
        ];
    }

    public function etiquetas()
    {
        $entradas = $this->request->exists('lista') && is_array($this->request->lista) 
                    ? $this->request->lista
                    : $this->model->entradas;

        return [
            'consolidado' => $this->model,
            'collection' => EntradaSheet::collection($this->request, $entradas, 'etiqueta'),
        ];
    }

    public function etapas()
    {        
        $entradas = $this->request->exists('lista') && is_array($this->request->lista) 
                    ? $this->request->lista
                    : $this->model->entradas;

        return [
            'consolidado' => $this->model,
            'collection' => EntradaSheet::collection($this->request, $entradas, 'etapas'),
        ];
    }
}
