<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtapaSaveRequest extends FormRequest
{
    private $mediciones_peso = [];
    private $mediciones_volumen = [];

    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $abbrs_peso = array_keys( config('system.mediciones.peso') );
        $abbrs_volumen = array_keys( config('system.mediciones.longitud') );

        $this->mediciones_peso = implode(',', $abbrs_peso);
        $this->mediciones_volumen = implode(',', $abbrs_volumen);
    }

    public function rules()
    {
        $etapa_id = $this->route('etapa')->id ?? 0;

        return [
            'nombre' => ['required','regex:/^[A-Za-z0-9 ]+$/','unique:etapas,nombre,' . $etapa_id],
            'orden' => ['required','integer','min:1',],
            'mediciones' => ['required','in:0,1,2'],
            'medicion_peso' => ['nullable','in:' . $this->mediciones_peso],
            'medicion_volumen' => ['nullable','in:' . $this->mediciones_volumen],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => __('Requiere el nombre de la etapa'),
            'nombre.regex' => __('Solo letras, números y espacios debe contener el nombre'),
            'nombre.unique' => __('Escribe un nombre diferente de la etapa'),
            'orden.required' => __('Escribe el orden correspondiente a la etapa'),
            'orden.integer' => __('La propiedad orden debe ser numerico entero'),
            'orden.min' => __('La propiedad orden de etapa es 1'),
            'mediciones.required' => __('Selecciona una opción de mediciones'),
            'medicion_peso.in' => __('Selecciona una opción valida en medición de peso'),
            'medicion_volumen.in' => __('Selecciona una opción valida en medición de volúmen'),
        ];
    }
}
