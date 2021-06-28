<?php

namespace App\Ahex\Entrada\Application\Update\Updaters;

class RemitenteUpdater extends Updater
{
    public function rules()
    {
        return [
            'remitente' => ['required', 'exists:remitentes,id']
        ];
    }

    public function messages()
    {
        return [
            'remitente.required' => 'Selecciona un remitente válido.',
            'remitente.exists'   => 'Selecciona un remitente existente.',
        ];
    }

    public function prepare()
    {
        return [
            'remitente_id' => $this->validated['remitente'],
            'updated_by' => rand(1,10),
        ];
    }

    public function redirect()
    {
        $this->redirect = redirect()->route('entradas.show', $this->entrada);
        return $this;
    }

    public function failure()
    {
        return $this->redirect->with('failure', 'Error al actualizar el remitente');
    }

    public function success()
    {
        return $this->redirect->with('success', 'Remitente actualizado');
    }
}
