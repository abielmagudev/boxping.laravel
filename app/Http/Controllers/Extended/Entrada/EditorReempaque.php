<?php

namespace App\Http\Controllers\Extended\Entrada;

use App\Http\Controllers\Extended\Abstracts\Editor;

use App\Client;
use App\Codigor;
use App\Reempacador;

class EditorReempaque extends Editor
{
    private $entrada;

    public function __construct($params)
    {
        $this->entrada = $params['entrada'];
    }

    public function template()
    {
        return 'entradas.edit.reempaque';
    }

    public function resources()
    {
        return [
            'entrada'             => $this->entrada,
            'codigosr'            => Codigor::all(),
            'reempacadores'       => Reempacador::all(),
            'reempacado_datetime' => !is_null($this->entrada->reempacado_at) ? explode(' ', $this->entrada->reempacado_at) : array(null,null),
        ];
    }
}
