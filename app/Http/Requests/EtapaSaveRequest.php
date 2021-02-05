<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtapaSaveRequest extends FormRequest
{
    private $medidas_peso = [];
    private $medidas_volumen = [];

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
        $etapa_id = $this->route('etapa')->id ?? 0;

        return [
            'nombre' => ['required','regex:/^[A-Za-z0-9 ]+$/','unique:etapas,nombre,' . $etapa_id],
            'orden' => ['required','integer','min:1',],
            'realiza_medicion' => ['required','boolean'],
            'unica_medida_peso' => ['nullable','in:' . $this->medidas_peso],
            'unica_medida_volumen' => ['nullable','in:' . $this->medidas_volumen],
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
            'realiza_medicion.required' => __('Selecciona una opción de medición'),
            'unica_medida_peso.in' => __('Selecciona una opción valida en peso'),
            'unica_medida_volumen.in' => __('Selecciona una opción valida en volúmen'),
        ];
    }
}
