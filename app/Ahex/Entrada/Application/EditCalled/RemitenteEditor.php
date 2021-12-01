<?php

namespace App\Ahex\Entrada\Application\EditCalled;

class RemitenteEditor extends Editor
{
    public function template(): string
    {
        return 'entradas.edit.remitente';
    }

    public function data(): array
    {
        $remitentes = $this->request->filled('buscar') 
                    ? \App\Remitente::search( $this->request->buscar )->get() 
                    : '';

        return [
            'entrada' => $this->entrada,
            'remitentes' => $remitentes,
            'searched' => $this->request->get('buscar', ''),
        ];
    }
}
