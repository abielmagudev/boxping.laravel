<?php

namespace App\Ahex\Entrada\Application\Update\Updaters;

class ConfirmacionUpdater extends Updater
{
    protected $messages = [
        'failure' => 'Error al actualizar la confirmación',
        'success' => 'Confirmación actualizada',
    ];

    public function prepared(): array
    {
        return [
            'confirmado_by' => rand(1,5),
            'confirmado_at' => now(),
            'updated_by' => rand(1,5),
        ];
    }

    public function route(\App\Entrada $entrada): string
    {
        return route('entradas.show', $entrada);
    }
}
