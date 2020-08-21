<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaEditRequest extends FormRequest
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
            'form' => ['required','in:entrada,cruce,reempaque']
        ];
    }

    public function messages()
    {
        return array(
            'form.required' => __('Edicion de entrada no valido'),
            'form.in' => __('Edicion de entrada no valido'),
        );
    }
}
