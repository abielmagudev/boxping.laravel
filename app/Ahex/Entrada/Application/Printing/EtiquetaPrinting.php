<?php

namespace App\Ahex\Entrada\Application\Printing;

use App\Destinatario;
use App\Salida;

class EtiquetaPrinting implements PrintingInterface
{
    public function content($entrada)
    {
        return [
            'entrada'      => $entrada,
            'ultima_etapa' => $entrada->ultimaEtapa(),
            'destinatario' => $entrada->destinatario ?? new Destinatario,
            'salida'       => $entrada->salida ?? new Salida,
        ];
    }

    public function sheet()
    {
        return 'entradas.printing.sheets.etiqueta';
    }

}
