<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuiaImpresionSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'transportadora' => ['required', 'exists:transportadoras,id'],
            'nombre' => 'required',
            'formato' => ['required','array'],
            'margenes' => ['required','array'],
            'tipografia' => ['required','array'],
            'contenido' => ['required','array'],
        ];
    }

    public function messages()
    {
        return [
            'transportadora.required' => 'Se requiere una transportadora',
            'transportadora.exists' => 'Selecciona una transportadora existente',
            'nombre.required' => 'Escribe el nombre de la guía de impresión',
            'formato.required' => 'Configura el formato de la guía de impresión',
            'formato.array' => 'Configura un formato válido de la guía de impresión',
            'margenes.required' => 'Configura los márgenes de la guía de impresión',
            'margenes.array' => 'Configura unos márgenes válidos de la guía de impresión',
            'tipografia.required' => 'Configura la tipografía de la guía de impresión',
            'tipografia.array' => 'Configura una tipografía válida de la guía de impresión',
            'contenido.required' => 'Selecciona el contenido de la guía de impresión',
            'contenido.array' => 'Selecciona un contenido válido de la guía de impresión',
        ];
    }
}
