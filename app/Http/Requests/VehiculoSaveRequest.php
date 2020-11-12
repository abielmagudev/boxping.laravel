<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $vehiculo_id = $this->route('vehiculo')->id ?? 0;

        return [
            'alias' => ['required', 'unique:vehiculos,id,' . $vehiculo_id],
            'descripcion' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'alias.required' => __('Escribe el alias del vehiculo'),
            'alias.unique' => __('Escribe un alias diferente del vehiculo'),
        ];
    }
}
