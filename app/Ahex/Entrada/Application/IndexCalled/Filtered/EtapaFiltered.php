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
        return $this->request->filled('etapa') && is_int( (int) $this->request->etapa );
    }
}
