<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Etapa;

class RegistrarSaveRequest extends FormRequest
{
    const ETAPA_SIN_TAREAS = null;

    private $reglas = [
        'etapa' => ['bail', 'required', 'exists:etapas,slug'],
        'numero' => ['bail', 'required', 'exists:entradas,numero'],
    ];

    private $mensajes = [
        'etapa.required' => 'Selecciona la etapa de registro',
        'etapa.exists' => 'Selecciona una etapa válida de registro',
        'numero.required' => 'Escribe el número de entrada',
        'numero.exists' => 'Escribe un número de entrada válido',
    ];

    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $etapa = Etapa::where('slug', $this->etapa)->first();

        if( ! $etapa->hasTareas() )
            return self::ETAPA_SIN_TAREAS;

        if( $etapa->hasTarea('peso') )
            $this->agregarReglasTareaPeso($etapa);

        if( $etapa->hasTarea('volumen') )
            $this->agregarReglasTareaVolumen($etapa);
    }

    public function agregarReglasTareaPeso($etapa)
    {
        $this->addRule([
            'peso' => ['required', 'numeric'],
            'medicion_peso' => ['required', 'in:' . implode(',', $etapa->abreviacionesMedicionesPeso())],
        ]);

        $this->addMessage([
            'peso.required' => __('Ingresa el peso correspondiente'),
            'peso.numeric' => __('Ingresa un peso válido'),
            'medicion_peso.required' => __('Selecciona la medición de peso'),
            'medicion_peso.in' => __('Selecciona una medición válida de peso'),
        ]);
    }

    public function agregarReglasTareaVolumen($etapa)
    {
        $this->addRule([
            'ancho' => ['required', 'numeric'],
            'altura' => ['required', 'numeric'],
            'largo' => ['required', 'numeric'],
            'medicion_volumen' => ['required', 'in:' . implode(',', $etapa->abreviacionesMedicionesVolumen())],
        ]);

        $this->addMessage([
            'ancho.required' => __('Ingresa el número de ancho correspondiente'),
            'ancho.numeric' => __('Ingresa un número de ancho válido'),
            'altura.required' => __('Ingresa el número de altura correspondiente'),
            'altura.numeric' => __('Ingresa un número de altura válido'),
            'largo.required' => __('Ingresa el número de largo correspondiente'),
            'largo.numeric' => __('Ingresa un número de largo válido'),
            'medicion_volumen.required' => __('Selecciona la medición de volúmen'),
            'medicion_volumen.in' => __('Selecciona una medición válida de volúmen'),
        ]);
    }

    public function addRule(array $agregar_reglas)
    {
        return $this->reglas = array_merge($this->reglas, $agregar_reglas);
    }

    public function addMessage(array $agregar_mensajes)
    {
        return $this->mensajes = array_merge($this->mensajes, $agregar_mensajes);
    }

    public function rules()
    {
        return $this->reglas;
    }

    public function messages()
    {
        return $this->mensajes;
    }
}
