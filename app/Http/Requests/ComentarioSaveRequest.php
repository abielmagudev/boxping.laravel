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
            'contenido' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'contenido.required' => __('Escribe el contenido del comentario'),
        ];
    }
}
