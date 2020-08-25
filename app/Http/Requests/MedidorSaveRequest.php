<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedidorSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $unique_rule = $this->getUniqueRule();

        return [
            'nombre' => ['required', $unique_rule],
            'descripcion' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => __('Escribe el nombre del medidor'),
            'nombre.unique' => __('Nombre de medidor ya existe, escribe un nombre diferente'),
        ];
    }

    private function getUniqueRule()
    {
        $medidor =  $this->route('medidor');

        if(! is_object($medidor) )
            return 'unique:medidores';

        return 'unique:medidores,nombre,' . $medidor->id;
    }
}
