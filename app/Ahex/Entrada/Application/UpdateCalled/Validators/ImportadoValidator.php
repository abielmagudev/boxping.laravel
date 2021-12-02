<?php

namespace App\Ahex\Entrada\Application\UpdateCalled\Validators;

class ImportadoValidator extends Validator
{
    public function rules(): array
    {
        return [
            'vehiculo' => ['required','exists:vehiculos,id'],
            'conductor'=> ['required','exists:conductores,id'],
            'numero_cruce' => ['required','integer'],
            'importado_fecha' => ['required','date'],
            'importado_hora' => ['required','date_format:H:i:s'],
        ];
    }

    public function messages(): array
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
}
