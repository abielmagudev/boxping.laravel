<?php

namespace App\Ahex\Entrada\Domain\Update;

class ConfirmacionUpdater extends Updater
{
    public function rules()
    {
        return [
            'confirmado' => ['required','accepted'],
        ];
    }

    public function messages()
    {
        return [
            'confirmado.required' => __('Activa la opción de verificación'),
            'confirmado.accepted' => __('Activa la opción válida de verificación'),
        ];
    }

    public function prepare($data)
    {
        return [
            'confirmado_by' => rand(1,5),
            'confirmado_at' => now(),
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
        return $this->redirect()->with('failure', 'Error al actualizar la confirmación');
    }

    public function success()
    {
        return $this->redirect()->with('success', 'Confirmación actualizada');
    }
}
