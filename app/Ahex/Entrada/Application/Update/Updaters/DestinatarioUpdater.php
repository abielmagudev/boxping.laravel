<?php

namespace App\Ahex\Entrada\Application\Update\Updaters;

class DestinatarioUpdater extends Updater
{
    public function rules()
    {
        return [
            'destinatario' => ['required', 'exists:destinatarios,id']
        ];
    }

    public function messages()
    {
        return [
            'destinatario.required' => 'Selecciona un destinatario válido.',
            'destinatario.exists'   => 'Selecciona un destinatario existente.',
        ];
    }

    public function prepare()
    {
        return [
            'destinatario_id' => $this->validated['destinatario'],
            'verificado_by' => null,
            'verificado_at' => null,
            'updated_by' => rand(1,5),
        ];
    }

    public function redirect()
    {
        $this->redirect = redirect()->route('entradas.show', $this->entrada);
        return $this;
    }

    public function failure()
    {
        return $this->redirect->with('failure', 'Error al actualizar el destinatario');
    }

    public function success()
    {
        return $this->redirect->with('success', 'Destinatario actualizado');
    }
}
