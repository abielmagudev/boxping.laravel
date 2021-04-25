<?php

namespace App\Ahex\Printing\Application\Templates;

use Illuminate\Database\Eloquent\Collection;
use App\Ahex\Printing\Application\SheetsTray;
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

class EntradaTemplate extends TemplateBase
{
    public static $collected = [];

    public function setContent($sheet)
    {
        switch ($sheet) {
            case 'etapas':
                return $this->etapas();
                break;

            case 'etiqueta':
                return $this->etiqueta();
                break;
            
            default:
                return $this->informacion();
                break;
        }
    }

    private function etapas()
    {
        return [
            'entrada' => $this->model,
            'etapas' => $this->model->etapas()->get(),
            'sheet' => SheetsTray::get('etapas'),
        ];
    }

    private function etiqueta()
    {
        return [
            'entrada' => $this->model,
            'ultima_etapa' => $this->model->ultimaEtapa(),
            'destinatario' => $this->model->destinatario ?? new Destinatario,
            'salida' => $this->model->salidaForzada(),
            'sheet' => SheetsTray::get('etiqueta'),
        ];
    }

    private function informacion()
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
            'sheet'        => SheetsTray::get('entrada'),
        ];
    }

    public static function collection($sheet, $models)
    {
        if(! $models instanceof Collection && is_array($models) )
            $models = Entrada::whereIn('id', $models)->get();

        foreach($models as $model)
        {
            if( $model instanceof Entrada )
            {
                $self = new static($sheet, $model);
                array_push(static::$collected, $self);
            }
        }

        return static::$collected;
    }
}
