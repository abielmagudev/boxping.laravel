<?php

namespace App\Ahex\Entrada\Application\EditCalled\Editors;

use App\Remitente;

class RemitenteEditor extends Editor
{
    public $template = 'entradas.edit.remitente';

    public function data(): array
    {
        return [
            'entrada' => $this->entrada,
            'remitentes' => request()->filled('buscar') ? Remitente::search( request('buscar') ) : '',
            'searched' => request('buscar', ''),
        ];
    }
}
