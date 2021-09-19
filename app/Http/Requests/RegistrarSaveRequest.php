<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Etapa;

class RegistrarSaveRequest extends FormRequest
{
    private $reglas = [
        'etapa' => ['required', 'exists:etapas,slug'],
        'numero' => ['required', 'exists:entradas,numero'],
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
        if( ! $etapa = Etapa::where('numero', $this->numero)->first() );
            return;

        
    }

    public function rules()
    {
        return $this->reglas;
    }

    public function messages()
    {
        return;
    }

    public function addRule()
    {

    }

    public function addMessage()
    {
        
    }
}
