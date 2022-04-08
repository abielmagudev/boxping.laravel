<?php

namespace App\Ahex\Entrada\Application\IndexCalled\Filtered;

use App\Etapa;

class EtapaFiltered extends ZFiltered
{
    public function title(): string
    {
        return 'Etapa';
    }

    public function content(): string
    {
        if(! $this->validate() )
            return 'Cualquiera';

        return Etapa::find($this->request->etapa)->nombre ?? 'Etapa desconocída';
    }

    public function validate()
    {
        // ctype_digit
        return $this->request->filled('etapa') && ctype_digit($this->request->etapa);
    }
}
