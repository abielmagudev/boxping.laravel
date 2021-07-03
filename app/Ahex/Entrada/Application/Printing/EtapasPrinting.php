<?php

namespace App\Ahex\Entrada\Application\Printing;

class EtapasPrinting implements PrintingInterface
{
    public function content($entrada)
    {
        return [
            'entrada'  => $entrada,
            'etapas'   => $entrada->etapas()->get(),
        ];
    }

    public function sheet()
    {
        return 'entradas.printing.sheets.etapas';
    }

}
