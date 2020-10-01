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
            'nombre' => ['required','unique:etapas'],
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
            'nombre.unique' => __('Escribe un nombre diferente de la etapa'),
            'realizar_medicion.required' => __('Selecciona una opción de medición'),
            'peso_en.in' => __('Selecciona una opción valida en peso'),
            'volumen_en.in' => __('Selecciona una opción valida en volúmen'),
        ];
    }
}
