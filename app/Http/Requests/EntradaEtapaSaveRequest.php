<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaEtapaSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'etapa' => ['required','exists:etapas,id'],
            'peso' => ['nullable','min:0'],
            'peso_en' => ['nullable','in:' . $this->values('peso')],
            'ancho' => ['nullable','min:0'],
            'altura' => ['nullable','min:0'],
            'largo' => ['nullable','min:0'],
            'dimensiones_en' => ['nullable','in:' . $this->values('dimension')],
        ];
    }

    public function messages()
    {
        return [
            'etapa.required' => __('Etapa es requerida'),
            'etapa.exists' => __('Selecciona una etapa válida'),
            'peso.min' => __('Peso minimo de 0.01'),
            'peso_en.in' => __('Selecciona un tipo de peso válido'),
            'ancho.min' => __('ancho minimo de 0.01'),
            'altura.min' => __('altura minimo de 0.01'),
            'largo.min' => __('largo minimo de 0.01'),
            'dimensiones_en.in' => __('Selecciona un tipo de dimensión válido'),
        ];
    }

    private function values($key)
    {
        $options = config('system.measures.' . $key);
        return implode(',', array_values($options));
    }
}
