<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CodigorSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $codigor_id = $this->route('codigor')->id ?? 0;

        return [
            'nombre' => ['required', "unique:codigosr,nombre,{$codigor_id}"],
            'descripcion' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => __('Escribe el nombre del código'),
            'nombre.unique' => __('Escribe otro nombre al código'),
        ];
    }
}
