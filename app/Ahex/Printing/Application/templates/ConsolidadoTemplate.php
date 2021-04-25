<?php

namespace App\Ahex\Printing\Application\Templates;

use App\Ahex\Printing\Application\SheetsTray;
use App\Consolidado;
use App\Cliente;
use App\Entrada;
use App\Salida;

class ConsolidadoTemplate extends TemplateBase
{
    public function setContent($sheet)
    {
        switch ($sheet) {
            case 'entradas':
                return $this->entradas();
                break;

            case 'etapas':
                return $this->etapas();
                break;

            case 'etiquetas':
                return $this->etiquetas();
                break;
            
            default:
                return $this->informacion();
                break;
        }
    }

    private function entradas()
    {
        return [
            'consolidado' => $this->model,
            'collection' => EntradaTemplate::collection('informacion', $this->model->entradas),
        ];
    }

    private function etapas()
    {
        return [
            'consolidado' => $this->model,
            'collection' => EntradaTemplate::collection('etapas', $this->model->entradas),
        ];
    }

    private function etiquetas()
    {
        return [
            'consolidado' => $this->model,
            'collection' => EntradaTemplate::collection('etiqueta', $this->model->entradas),
        ];
    }

    private function informacion()
    {
        return [
            'consolidado' => $this->model,
            'cliente'     => $this->model->cliente ?? new Cliente,
            'entradas'    => $this->model->entradas,
            'sheet'       => SheetsTray::get('consolidado'),
        ];
    }
}
