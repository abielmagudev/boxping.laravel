<?php

namespace App\Ahex\Entrada\Application\EditCalled;

class DestinatarioEditor extends Editor
{
    public function template(): string
    {
        return 'entradas.edit.destinatario';
    }

    public function data(): array
    {
        $destinatarios = $this->request->filled('buscar') 
                        ? \App\Destinatario::search( $this->request->buscar )->get() 
                        : '';

        return [
            'entrada' => $this->entrada,
            'destinatarios' => $destinatarios,
            'searched' => $this->request->get('buscar', ''),
        ];
    }
}
