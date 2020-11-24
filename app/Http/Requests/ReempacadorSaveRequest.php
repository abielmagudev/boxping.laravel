<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReempacadorSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $reempacador_id = $this->route('reempacador')->id ?? 0;

        return [
            'nombre' => ['required', 'unique:reempacadores,nombre,' . $reempacador_id],
            'clave'  => $reempacador_id ? 'nullable' : 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => __('Escribe el nombre del reempacador'),
            'nombre.unique'   => __('Escribe otro nombre al reempacador'),
            'clave.required'  => __('Escribe la clave del reempacador'),
        ];
    }
}
