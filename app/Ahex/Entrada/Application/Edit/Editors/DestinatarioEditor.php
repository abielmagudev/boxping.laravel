<?php

namespace App\Ahex\Entrada\Application\Edit\Editors;

use App\Destinatario;

class DestinatarioEditor extends Editor
{
    public $template = 'entradas.edit.destinatario';

    public function data(): array
    {
        return [
            'entrada' => $this->entrada,
            'destinatarios' => request()->filled('buscar') ? Destinatario::search( request('buscar') ) : '',
            'searched' => request('buscar', ''),
        ];
    }
}
