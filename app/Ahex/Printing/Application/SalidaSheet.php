<?php

namespace App\Ahex\Printing\Application;

use App\Salida;
use App\Remitente;
use App\Destinatario;
use App\Entrada;

class SalidaSheet extends SheetBase
{
    public $default_sheet = 'informacion';

    public function informacion()
    {
        return [
            'salida'        => $this->model,
            'remitente'     => $this->model->remitente ?? new Remitente,
            'destinatario'  => $this->model->destinatario ?? new Destinatario,
            'template'      => 'printing.templates.salida',
        ];
    }
}
