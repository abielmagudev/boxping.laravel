<?php

namespace App\Ahex\Entrada\Application\IndexCalled\Filtered;

use App\Reempacador;

class ReempacadorFiltered extends ZFiltered
{
    public function title(): string
    {
        return 'Reempacador';
    }

    public function content(): string
    {
        if(! $this->validate() )
            return 'Cualquiera';

        return Reempacador::find($this->request->reempacador)->nombre ?? 'Reempacador desconocído';
    }

    public function validate()
    {
        return $this->request->filled('reempacador') && ctype_digit($this->request->reempacador);
    }
}
