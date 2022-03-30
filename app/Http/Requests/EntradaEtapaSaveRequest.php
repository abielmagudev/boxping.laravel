<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Etapa;

class EntradaEtapaSaveRequest extends FormRequest
{
    const ETAPA_NO_EXISTE = null;

    private $etapa_mediciones;

    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->etapa_mediciones = (object) [
            'peso' => implode(',', Etapa::medicionesPeso(true)),
            'volumen' => implode(',', Etapa::medicionesVolumen(true))
        ];
    }

    public function rules()
    {
        return [
            'etapa' => ['bail','required','exists:etapas,id'],
            'peso' => ['nullable','min:0'],
            'medicion_peso' => ['nullable','in:' . $this->etapa_mediciones->peso],
            'ancho' => ['nullable','min:0'],
            'altura' => ['nullable','min:0'],
            'largo' => ['nullable','min:0'],
            'medicion_volumen' => ['nullable','in:' . $this->etapa_mediciones->volumen],
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
            'medicion_peso.in' => __('Selecciona una medición de peso válido'),
            'ancho.min' => __('ancho minimo de 0.01'),
            'altura.min' => __('altura minimo de 0.01'),
            'largo.min' => __('largo minimo de 0.01'),
            'medicion_volumen.in' => __('Selecciona una medición de volúmen válido'),
            'zona.exists' => __('Selecciona una zona válida'),
        ];
    }
}
