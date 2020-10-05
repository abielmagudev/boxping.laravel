<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtapaSaveRequest extends FormRequest
{
    private $etapa_id = 0;
    private $medidas_peso = [];
    private $medidas_volumen = [];

    public function __construct()
    {
        parent::__construct();
        $this->medidas_peso = implode(',', config('system.measures.peso'));
        $this->medidas_volumen = implode(',', config('system.measures.volumen'));
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if( $etapa = $this->route('etapa') ) $this->etapa_id = $etapa->id;

        return [
            'nombre' => ['required','regex:/^[A-Za-z0-9 ]+$/','unique:etapas,id,' . $this->etapa_id],
            'realiza_medicion' => ['required','boolean'],
            'medida_peso' => ['nullable','in:' . $this->medidas_peso],
            'medida_volumen' => ['nullable','in:' . $this->medidas_volumen],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => __('Requiere el nombre de la etapa'),
            'nombre.regex' => __('Solo letras, números y espacios debe contener el nombre'),
            'nombre.unique' => __('Escribe un nombre diferente de la etapa'),
            'realiza_medicion.required' => __('Selecciona una opción de medición'),
            'medida_peso.in' => __('Selecciona una opción valida en peso'),
            'medida_volumen.in' => __('Selecciona una opción valida en volúmen'),
        ];
    }
}
