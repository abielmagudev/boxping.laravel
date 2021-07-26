<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncidenteSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $incidente_id = $this->route('incidente')->id ?? 0;

        return [
            'nombre' => ['required', 'unique:incidentes,nombre,' . $incidente_id],
            'descripcion' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => __('Escribe el nombre del incidente'),
            'nombre.unique' => __('Escribe otro nombre al incidente'),
        ];
    }
}
