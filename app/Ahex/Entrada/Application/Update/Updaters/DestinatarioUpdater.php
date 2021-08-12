<?php

namespace App\Ahex\Entrada\Application\Update\Updaters;

class DestinatarioUpdater extends Updater
{
    protected $messages = [
        'failure' => 'Error al actualizar el destinatario',
        'success' => 'Destinatario actualizada',
    ];

    public function prepared(): array
    {
        return [
            'destinatario_id' => $this->validated['destinatario'],
            'confirmado_by' => null,
            'confirmado_at' => null,
            'updated_by' => rand(1,5),
        ];
    }

    public function route(\App\Entrada $entrada): string
    {
        return route('entradas.show', $entrada);
    }
}
