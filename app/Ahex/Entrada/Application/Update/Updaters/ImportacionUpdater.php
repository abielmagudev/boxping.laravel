<?php

namespace App\Ahex\Entrada\Application\Update\Updaters;

class ImportacionUpdater extends Updater
{
    public function rules()
    {
        return [
            'vehiculo' => ['required','exists:vehiculos,id'],
            'conductor'=> ['required','exists:conductores,id'],
            'numero_cruce' => ['required','integer'],
            'importado_fecha' => ['required','date'],
            'importado_hora' => ['required','date_format:H:i:s'],
        ];
    }

    public function messages()
    {
        return [
            'vehiculo.required' => __('Selecciona el vehiculo'),
            'vehiculo.exists' => __('Selecciona un vehiculo válido'),
            'conductor.required' => __('Selecciona el conductor'),
            'conductor.exists' => __('Selecciona un conductor válido'),
            'numero_cruce.required' => __('Escribe el número de vuelta'),
            'numero_cruce.integer' => __('Escribe un número para la vuelta'),
            'importado_fecha.required' => __('Selecciona la fecha de importación'),
            'importado_fecha.date' => __('Selecciona una fecha de importación válida'),
            'importado_hora.required' => __('Selecciona la hora de importación'),
            'importado_hora.date_format' => __('Selecciona una hora de importación válida'),
        ];
    }

    public function prepare($data)
    {
        return [
            'vehiculo_id'     => $data['vehiculo'],
            'conductor_id'    => $data['conductor'],
            'numero_cruce'    => $data['numero_cruce'],
            'importado_fecha' => $data['importado_fecha'],
            'importado_hora'  => $data['importado_hora'],
            'updated_by'      => rand(1,5),
        ];
    }

    public function save($data)
    {
        $prepared = $this->prepare($data);
        return $this->entrada->fill( $prepared )->save();
    }

    public function redirect()
    {
        return redirect()->route('entradas.edit', [$this->entrada, 'editor' => 'importacion']);
    }

    public function failure()
    {
        return $this->redirect()->with('failure', 'Error al actualizar la importación');
    }

    public function success()
    {
        return $this->redirect()->with('success', 'Importación actualizada');
    }
}
