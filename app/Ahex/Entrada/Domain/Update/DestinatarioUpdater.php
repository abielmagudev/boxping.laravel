<?php

namespace App\Ahex\Entrada\Domain\Update;

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

    public function prepare($data)
    {
        return [
            'destinatario_id' => $data['destinatario'],
            'verificado_by' => null,
            'verificado_at' => null,
            'updated_by' => rand(1,5),
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
        return $this->redirect()->with('failure', 'Error al actualizar el destinatario');
    }

    public function success()
    {
        return $this->redirect()->with('success', 'Destinatario actualizado');
    }
}
