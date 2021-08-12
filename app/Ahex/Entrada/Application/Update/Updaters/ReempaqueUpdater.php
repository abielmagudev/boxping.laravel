<?php

namespace App\Ahex\Entrada\Application\Update\Updaters;

class ReempaqueUpdater extends Updater
{
    protected $messages = [
        'failure' => 'Error al actualizar el reempaque',
        'success' => 'Reempaque actualizado',
    ];

    public function prepared(): array
    {
        return [
            'codigor_id' => $this->validated['codigo_reempacado'],
            'reempacado_fecha' => $this->validated['reempacado_fecha'],
            'reempacado_hora' => $this->validated['reempacado_hora'],
            'reempacador_id' => $this->validated['reempacador'],
            'updated_by' => rand(1,5),
        ];
    }

    public function route(\App\Entrada $entrada): string
    {
        return route('entradas.edit', [$entrada, 'editor' => 'reempaque']);
    }
}
