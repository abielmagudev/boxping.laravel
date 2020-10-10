<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransportadoraSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $transportadora_id = $this->route('transportadora')->id ?? 0;

        return [
            'nombre' => ['required','unique:transportadoras,nombre,' . $transportadora_id],
            'web' => ['nullable','url'],
            'telefono' => 'nullable',
            'notas' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => __('Escribe el nombre de la transportadora'),
            'nombre.unique' => __('Escribe un nombre diferente a la transportadora'),
            'web.url' => __('Escribe el sitio web en formato correcto'),
        ];
    }
}
