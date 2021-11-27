<?php

namespace App\Ahex\Entrada\Application\UpdateCalled\Updaters;

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
            'updated_by' => auth()->user()->id,
        ];
    }

    public function route(\App\Entrada $entrada): string
    {
        return route('entradas.show', $entrada);
    }
}
