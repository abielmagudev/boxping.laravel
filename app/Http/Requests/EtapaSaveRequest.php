<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtapaSaveRequest extends FormRequest
{
    private $peso_options = [];
    private $volumen_options = [];

    public function __construct()
    {
        parent::__construct();

        $this->peso_options = implode(',', config('system.measures.peso'));
        $this->volumen_options = implode(',', config('system.measures.volumen'));
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => ['required','regex:/^[A-Za-z0-9 ]+$/','unique:etapas,id,' . $this->getEtapaId()],
            'descripcion' => 'nullable',
            'realizar_medicion' => ['required','boolean'],
            'peso_en' => ['nullable','in:' . $this->peso_options],
            'volumen_en' => ['nullable','in:' . $this->volumen_options],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => __('Requiere el nombre de la etapa'),
            'nombre.regex' => __('Solo letras, números y espacios debe contener el nombre'),
            'nombre.unique' => __('Escribe un nombre diferente de la etapa'),
            'realizar_medicion.required' => __('Selecciona una opción de medición'),
            'peso_en.in' => __('Selecciona una opción valida en peso'),
            'volumen_en.in' => __('Selecciona una opción valida en volúmen'),
        ];
    }

    public function getEtapaId()
    {
        if( $etapa = $this->route('etapa') )
            return $etapa->id;

        return 0;
    }
}
