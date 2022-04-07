<?php

namespace App\Ahex\Entrada\Application\IndexCalled\Filtered;

use App\Destinatario;

class DestinatarioFiltered extends ZFiltered
{
    public function title(): string
    {
        return 'Destinatario';
    }

    public function content(): string
    {
        if(! $this->validate() ) 
            return 'Cualquiera';
        
        if(! $destinatario = Destinatario::find($this->request->destinatario)) 
            return 'Destinatario desconocído';

        return "{$destinatario->nombre} <br> 
                + <span class='fw-normal'>{$destinatario->direccion}</span> <br> 
                + <span class='fw-normal'>{$destinatario->localidad}</span>";
    }

    public function validate()
    {
        return $this->request->filled('destinatario') && is_int( (int) $this->request->destinatario );
    }
}
