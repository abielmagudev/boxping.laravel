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

    public function prepare($data)
    {
        return [
            'remitente_id' => $data['remitente'],
            'updated_by' => rand(1,10),
        ];
    }

    public function save($data)
    {
        $prepared = $this->prepare($data);
        return $this->entrada->fill( $prepared )->save();
    }

    public function redirect()
    {
        return redirect()->route('entradas.show', $this->entrada);
    }

    public function failure()
    {
        return $this->redirect()->with('failure', 'Error al actualizar el remitente');
    }

    public function success()
    {
        return $this->redirect()->with('success', 'Remitente actualizado');
    }
}
