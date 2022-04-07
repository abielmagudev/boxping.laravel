<?php

namespace App\Ahex\Entrada\Application\IndexCalled\Filtered;

class NumeroFiltered extends ZFiltered
{
    public $comodines = ['incial', 'final'];

    public function title(): string
    {
        if(! $this->request->filled('numero') )
            return 'Número';
        
        if(! in_array($this->request->comodin, $this->comodines) )
            $this->request->comodin = 'sin filtro';

        return "Número {$this->request->comodin}";
    }

    public function content(): string
    {
        return $this->request->numero ?? 'Cualquiera';
    }
}
