<?php

namespace App\Ahex\Entrada\Application\IndexCalled\Filtered;

class SalidaFiltered extends ZFiltered
{
    public function title(): string
    {
        return 'Salida';
    }

    public function content(): string
    {
        if(! in_array($this->request->salida, ['con', 'sin'])  )
            return 'Con salida ó sin salida';

        if( $this->request->salida === 'con' )
            return 'Si';

        return 'No';
    }
}
