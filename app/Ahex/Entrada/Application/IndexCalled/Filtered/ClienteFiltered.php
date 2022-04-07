<?php

namespace App\Ahex\Entrada\Application\IndexCalled\Filtered;

use App\Cliente;

class ClienteFiltered extends ZFiltered
{
    public function title(): string
    {
        return 'Cliente';
    }

    public function content(): string
    {
        if(! $this->validate() )
            return 'Cualquiera';

        return Cliente::find($this->request->cliente)->nombre_con_alias ?? 'Cliente desconocído';
    }

    public function validate()
    {
        return $this->request->filled('cliente') && is_int( (int) $this->request->cliente );
    }
}
