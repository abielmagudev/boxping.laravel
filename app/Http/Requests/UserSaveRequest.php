<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserSaveRequest extends FormRequest
{
    private $user_id;

    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'nombre' => ['required', 'string'],
            'email' => ['required', 'email', "unique:users,email,{$this->user_id}"],
        ];

        if( $this->isMethod('post') || $this->filled('clave') )
            $rules['clave'] = ['required', 'confirmed'];

        return $rules;
    }

    public function messages()
    {
        return [
            'nombre.required' => __('Requiere el nombre de usuario'),
            'nombre.string' => __('Escribe un nombre de usuario válido'),
            'email.required' => __('Requiere el email de usuario'),
            'email.email' => __('Escribe un email de usuario válido'),
            'email.unique' => __('Escribe un email de usuario diferente'),
            'clave.required' => __('Requiere una clave de usuario'),
            'clave.confirmed' => __('La clave y la confirmación de clave deben ser idénticas'),
        ];
    }

    public function prepareForValidation()
    {
        $this->user_id = $this->route('usuario') ?? 0;
    }
}
