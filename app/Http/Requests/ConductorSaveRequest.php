<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConductorSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $conductor_id = $this->route('conductor')->id ?? 0;
        return [
            'nombre' => ['required', 'unique:conductores,nombre,' . $conductor_id],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => __('Escribe el nombre del conductor'),
            'nombre.unique' => __('Escribe un nombre diferente del conductor'),
        ];
    }
}
