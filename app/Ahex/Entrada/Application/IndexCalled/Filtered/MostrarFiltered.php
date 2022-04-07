<?php

namespace App\Ahex\Entrada\Application\IndexCalled\Filtered;

class MostrarFiltered extends ZFiltered
{
    public function title(): string
    {
        return 'Por página';
    }

    public function content(): string
    {
        return is_numeric($this->request->get('mostrar')) 
                ? $this->request->mostrar
                : 'Completa';
    }
}
