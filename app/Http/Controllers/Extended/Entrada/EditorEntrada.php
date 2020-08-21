<?php

namespace App\Http\Controllers\Extended\Entrada;

use App\Http\Controllers\Extended\Abstracts\Editor;

use App\Cliente;

class EditorEntrada extends Editor
{
    protected $entrada;

    public function __construct($params)
    {
        $this->entrada = $params['entrada'];
    }

    public function template()
    {
        return 'entradas.edit.entrada';
    }

    public function resources()
    {
        return array(
            'entrada' => $this->entrada,
            'clientes' => Cliente::where('disponible',1)->get(['id','nombre','alias']),
        );
    }
}