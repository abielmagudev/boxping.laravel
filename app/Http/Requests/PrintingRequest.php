<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrintingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'contenido' => ['in:entradas,etiquetas,etapas'],
        ];
    }

    public function messages()
    {
        return [
            'contenido.in' => __('Selecciona un contenido válido de impresión.'),
        ];
    }
}
