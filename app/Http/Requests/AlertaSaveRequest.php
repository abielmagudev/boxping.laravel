<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Alerta;

class AlertaSaveRequest extends FormRequest
{
    private $nombres_niveles,
            $alerta_id;

    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->nombres_niveles = implode(',', Alerta::getNombresNiveles());
        $this->alerta_id = $this->route('alerta')->id ?? 0;
    }

    public function rules()
    {
        return [
            'nivel' => ['required', 'in:' . $this->nombres_niveles],
            'nombre' => ['required', 'unique:alertas,nombre,' . $this->alerta_id],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => __('Escribe el nombre de alerta'),
            'nombre.unique' => __('Escribe un nombre de alerta diferente'),
            'nivel.required' => __('Selecciona el nivel de alerta'),
            'nivel.in' => __('Selecciona un nivel válido de alerta'),
        ];
    }
}
