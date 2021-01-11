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
            'titulo' => ['required', 'unique:incidentes,titulo,' . $incidente_id],
            'descripcion' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => __('Escribe el titulo del incidente'),
            'titulo.unique' => __('Escribe otro titulo al incidente'),
        ];
    }
}
