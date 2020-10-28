<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaEtapaSaveRequest extends FormRequest
{
    private $medidas_peso;
    private $medidas_volumen;

    public function __construct()
    {
        parent::__construct();

        $this->medidas_peso = implode(',', config('system.medidas.peso'));
        $this->medidas_volumen = implode(',', config('system.medidas.volumen'));
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'etapa' => ['required','exists:etapas,id'],
            'peso' => ['nullable','min:0'],
            'medida_peso' => ['nullable','in:' . $this->medidas_peso],
            'ancho' => ['nullable','min:0'],
            'altura' => ['nullable','min:0'],
            'largo' => ['nullable','min:0'],
            'medida_volumen' => ['nullable','in:' . $this->medidas_volumen],
            'zona' => ['nullable','exists:etapa_zonas,id'],
            'alertas' => ['nullable','array'],
        ];
    }

    public function messages()
    {
        return [
            'etapa.required' => __('Etapa es requerida'),
            'etapa.exists' => __('Selecciona una etapa válida'),
            'peso.min' => __('Peso minimo de 0.01'),
            'medida_peso.in' => __('Selecciona una medida de peso válido'),
            'ancho.min' => __('ancho minimo de 0.01'),
            'altura.min' => __('altura minimo de 0.01'),
            'largo.min' => __('largo minimo de 0.01'),
            'medida_volumen.in' => __('Selecciona una medida de volúmen válido'),
            'zona.exists' => __('Selecciona una zona válida'),
        ];
    }
}
