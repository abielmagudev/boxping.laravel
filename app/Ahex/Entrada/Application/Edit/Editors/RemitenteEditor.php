<?php

namespace App\Ahex\Entrada\Application\Edit\Editors;

use App\Remitente;

class RemitenteEditor extends Editor
{
    public function template(): string
    {
        return 'entradas.edit.remitente';
    }

    public function data(): array
    {
        return [
            'entrada' => $this->entrada,
            'remitentes' => request()->filled('buscar') ? Remitente::search( request('buscar') ) : '',
            'searched' => request('buscar', ''),
        ];
    }
}
