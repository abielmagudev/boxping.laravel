<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncidenteSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->route_incidente_id = $this->route('incidente')->id ?? 0;
    }

    public function rules()
    {
        return [
            'nombre' => ['required', 'unique:incidentes,nombre,' . $this->route_incidente_id],
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
