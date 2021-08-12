<?php

namespace App\Ahex\Entrada\Application\Update\Updaters;

class RemitenteUpdater extends Updater
{
    protected $messages = [
        'failure' => 'Error al actualizar el remitente',
        'success' => 'Remitente actualizado',
    ];

    public function prepared(): array
    {
        return [
            'remitente_id' => $this->validated['remitente'],
            'updated_by' => rand(1,10),
        ];
    }

    public function route(\App\Entrada $entrada): string
    {
        return route('entradas.show', $entrada);
    }
}
