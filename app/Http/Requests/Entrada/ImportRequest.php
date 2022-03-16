<?php

namespace App\Http\Requests\Entrada;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ImportRequest extends FormRequest
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
            'import_entradas' => [
                'required',
                'mimes:csv,txt',
            ],
            'import_entradas_consolidado' => [
                Rule::exists('consolidados','id')->where( function ($query) {
                    return $query->where('status', 'abierto');
                }),
            ],
            'import_entradas_cliente' => [
                'required_without:import_entradas_consolidado',
                'exists:clientes,id',
            ],
        ];
    }

    public function messages()
    {
        return [
            'import_entradas.required' => __('Require plantilla para importar la información'),
            'import_entradas.mimes' => __('La plantilla debe ser en formato/extensión: *.csv'),
            'import_entradas_consolidado.exists' => __('Consolidado no válido para importar entradas'),
            'import_entradas_cliente.exists' => __('Cliente no válido para importar entradas'),
        ];
    }
}
