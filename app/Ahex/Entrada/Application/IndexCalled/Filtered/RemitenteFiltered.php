<?php

namespace App\Ahex\Entrada\Application\IndexCalled\Filtered;

use App\Remitente;

class RemitenteFiltered extends ZFiltered
{
    public function title(): string
    {
        return 'Remitente';
    }

    public function content(): string
    {
        if(! $this->validate() )
            return 'Cualquiera';
        
        if(! $remitente = Remitente::find($this->request->remitente) )
            return 'Remitente desconocído';

        return "{$remitente->nombre} <br> 
                + <span class='fw-normal'>{$remitente->direccion}</span> <br> 
                + <span class='fw-normal'>{$remitente->localidad}</span>";
    }

    public function validate()
    {
        return $this->request->filled('remitente') && is_int( (int) $this->request->remitente );
    }
}
