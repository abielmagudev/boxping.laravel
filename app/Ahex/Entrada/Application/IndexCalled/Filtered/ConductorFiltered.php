<?php

namespace App\Ahex\Entrada\Application\IndexCalled\Filtered;

use App\Conductor;

class ConductorFiltered extends ZFiltered
{
    public function title(): string
    {
        return 'Conductor';
    }

    public function content(): string
    {
        if(! $this->validate() )
            return 'Cualquiera';

        return Conductor::find($this->request->conductor)->nombre ?? 'Conductor desconocído';
    }

    public function validate()
    {
        return $this->request->filled('conductor') && is_int( (int) $this->request->conductor );
    }
}
