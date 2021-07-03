<?php

namespace App\Ahex\Entrada\Application\Printing;

use App\Consolidado;
use App\Cliente;
use App\Remitente;
use App\Destinatario;
use App\Conductor;
use App\Vehiculo;
use App\Reempacador;
use App\Codigor;
use App\Salida;

class InformacionPrinting implements PrintingInterface
{
    public function content($entrada)
    {
        return [
            'entrada'      => $entrada,
            'consolidado'  => $entrada->consolidado ?? new Consolidado,
            'cliente'      => $entrada->cliente ?? new Cliente,
            'remitente'    => $entrada->remitente ?? new Remitente,
            'destinatario' => $entrada->destinatario ?? new Destinatario,
            'conductor'    => $entrada->conductor ?? new Conductor,
            'vehiculo'     => $entrada->vehiculo ?? new Vehiculo,
            'reempacador'  => $entrada->reempacador ?? new Reempacador,
            'codigor'      => $entrada->codigor ?? new Codigor,
            'salida'       => $entrada->salida ?? new Salida,
        ];
    }

    public function sheet()
    {
        return 'entradas.printing.sheets.informacion';
    }
}
