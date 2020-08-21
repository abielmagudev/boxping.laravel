<?php

namespace App\Http\Controllers\Extended\Entrada;

use App\Http\Controllers\Extended\Abstracts\Editor;

use App\Vehiculo;
use App\Conductor;

class EditorCruce extends Editor
{
    protected $entrada;

    public function __construct($params)
    {
        $this->entrada = $params['entrada'];
    }

    public function template()
    {
        return 'entradas.edit.cruce';
    }

    public function resources()
    {
        return [
            'entrada' => $this->entrada,
            'vehiculos' => Vehiculo::all(),
            'conductores' => Conductor::all(),
            'cruce_datetime' => !is_null($this->entrada->cruce_at) ? explode(' ', $this->entrada->cruce_at) : array(null,null),
        ];
    }
}