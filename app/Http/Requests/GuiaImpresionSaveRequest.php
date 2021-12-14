<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuiaImpresionSaveRequest extends FormRequest
{
    private $except_guia_id;

    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->except_guia_id = $this->guia->id ?? 0;
    }

    public function rules()
    {
        return [
            'nombre' => ['required','unique:guias_impresion,nombre,' . $this->except_guia_id],
            'descripcion' => ['nullable', 'string'],
            'formato' => ['required','array'],
            'margenes' => ['required','array'],
            'tipografia' => ['required','array'],
            'contenido' => ['required','array'],
            'texto_final' => ['nullable', 'string'],
            'desactivar' => ['boolean'],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Escribe el nombre de la guía de impresión',
            'nombre.unique' => 'Escribe un nombre diferente a la guía de impresión',
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
