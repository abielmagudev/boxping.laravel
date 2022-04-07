<?php

namespace App\Ahex\Entrada\Application\IndexCalled\Filtered;

use App\Codigor;

class CodigorFiltered extends ZFiltered
{
    public function title(): string
    {
        return 'Código de reempacado';
    }

    public function content(): string
    {
        if(! $this->validate() )
            return 'Cualquiera';

        return Codigor::find($this->request->codigor)->nombre ?? 'Código de reempacado desconocído';
    }

    public function validate()
    {
        return $this->request->filled('codigor') && is_int( (int) $this->request->codigor );
    }
}
