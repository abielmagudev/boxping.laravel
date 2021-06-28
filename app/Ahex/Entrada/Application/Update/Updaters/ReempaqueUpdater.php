<?php

namespace App\Ahex\Entrada\Application\Update\Updaters;

class ReempaqueUpdater extends Updater
{
    public function rules()
    {
        return [
            'codigo_reempacado' => ['required','integer','exists:codigosr,id'],
            'reempacador' => ['required','integer','exists:reempacadores,id'],
            'reempacado_fecha' => ['required','date'],
            'reempacado_hora' => ['required','date_format:H:i:s'],
        ];
    }

    public function messages()
    {
        return [
            'codigo_reempacado.required' => __('Selecciona el código de reempacado'),
            'codigo_reempacado.integer' => __('Selecciona el código de reempacado válido'),
            'codigo_reempacado.exists' => __('Selecciona el código de reempacado existente'),
            'reempacador.required' => __('Selecciona el reempacador'),
            'reempacador.integer' => __('Selecciona el reempacador válido'),
            'reempacador.exists' => __('Selecciona el reempacador existente'),
            'reempacado_fecha.required' => __('Selecciona la fecha de reempacado'),
            'reempacado_fecha.integer' => __('Selecciona la fecha de reempacado válido'),
            'reempacado_hora.required' => __('Selecciona la hora de reempacado'),
            'reempacado_hora.integer' => __('Selecciona la hora de reempacado válido'),
        ];
    }

    public function prepare()
    {
        return [
            'codigor_id' => $this->validated['codigo_reempacado'],
            'reempacado_fecha' => $this->validated['reempacado_fecha'],
            'reempacado_hora' => $this->validated['reempacado_hora'],
            'reempacador_id' => $this->validated['reempacador'],
            'updated_by' => rand(1,5),
        ];
    }

    public function redirect()
    {
        $this->redirect = redirect()->route('entradas.edit', [$this->entrada, 'editor' => 'reempaque']);
        return $this;
    }

    public function failure()
    {
        return $this->redirect->with('failure', 'Error al actualizar el reempaque');
    }

    public function success()
    {
        return $this->redirect->with('success', 'Reempaque actualizado');
    }
}
