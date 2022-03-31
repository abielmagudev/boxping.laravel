<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComentarioSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'contenido' => ['required','string'],
            'entrada' => ['required','exists:entradas,id'],
        ];
    }

    public function messages()
    {
        return [
            'contenido.required' => __('Escribe el contenido del comentario'),
            'contenido.string' => __('Escribe un contenido válido para el comentario'),
            'entrada.required' => __('Selecciona una entrada para comentar'),
            'entrada.exists' => __('Selecciona una entrada válida para comentar'),
        ];
    }
}
