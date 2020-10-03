<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZonaSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required'
        ];
    }
    
    public function messages()
    {
        return [
            'nombre.required' => __('Escribe el nombre de la zona'),
        ];
    }
}
