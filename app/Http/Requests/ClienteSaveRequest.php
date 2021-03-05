<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $cliente_id = $this->route('cliente')->id ?? 0;

        return [
            'nombre' => ['required','unique:clientes,nombre,' . $cliente_id],
            'alias' => ['required','unique:clientes,alias,' . $cliente_id],
            'contacto' => 'required',
            'telefono' => 'required',
            'correo_electronico' => 'required',
            'direccion' => 'required',
            'ciudad' => 'required',
            'estado' => 'required',
            'pais' => 'required',
            'notas' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => __('Escribe nombre del cliente'),
            'nombre.unique' => __('Escribe un nombre diferente'),
            'alias.required' => __('Escribe alias del cliente'),
            'alias.unique' => __('Escribe un alias diferente'),
            'contacto.required' => __('Escribe el nombre del contacto'),
            'telefono.required' => __('Escribe el teléfono'),
            'correo_electronico.required' => __('Escribe el correo electrónico'),
            'direccion.required' => __('Escribe la dirección'),
            'ciudad.required' => __('Escribe la ciudad'),
            'estado.required' => __('Escribe el estado'),
            'pais.required' => __('Escribe el pais'),
        ];
    }
}
