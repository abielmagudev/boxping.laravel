<?php

namespace App\Ahex\Entrada\Application\IndexCalled\Filtered;

class AmbitoFiltered extends ZFiltered
{
    public $ambitos = ['con', 'sin'];

    public function title(): string
    {
        return 'Ámbito';
    }

    public function content(): string
    {
        if(! in_array($this->request->ambito, $this->ambitos)  )
            return 'Consolidadas ó sin consolidar';

        if( $this->request->ambito === 'con' )
            return 'Consolidadas';

        return 'Sin consolidar';
    }
}
