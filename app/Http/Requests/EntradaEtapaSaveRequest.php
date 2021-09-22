<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Etapa;

class EntradaEtapaSaveRequest extends FormRequest
{
    const ETAPA_NO_EXISTE = null;

    private $mediciones_peso_imploded;
    private $mediciones_volumen_imploded;

    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if( ! $etapa_model = Etapa::where('id', $this->etapa)->first() )
            return self::ETAPA_NO_EXISTE;

        $this->mediciones_peso_imploded = implode(',', $etapa_model->abreviacionesMedicionesPeso());
        $this->mediciones_volumen_imploded = implode(',', $etapa_model->abreviacionesMedicionesVolumen());
    }

    public function rules()
    {
        return [
            'etapa' => ['bail','required','exists:etapas,id'],
            'peso' => ['nullable','min:0'],
            'medicion_peso' => ['nullable','in:' . $this->mediciones_peso_imploded],
            'ancho' => ['nullable','min:0'],
            'altura' => ['nullable','min:0'],
            'largo' => ['nullable','min:0'],
            'medicion_volumen' => ['nullable','in:' . $this->mediciones_volumen_imploded],
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
