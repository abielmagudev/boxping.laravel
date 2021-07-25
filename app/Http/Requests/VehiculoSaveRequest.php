<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->route_vehiculo_id = $this->route('vehiculo')->id ?? 0;
    }

    public function rules()
    {
        return [
            'nombre' => ['required', 'unique:vehiculos,id,' . $this->route_vehiculo_id],
            'descripcion' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => __('Escribe el nombre del vehículo'),
            'nombre.unique' => __('Escribe un nombre diferente del vehículo'),
        ];
    }
}
