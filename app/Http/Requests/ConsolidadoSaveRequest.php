<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ConsolidadoSaveRequest extends FormRequest
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
        $consolidado_id = $this->route('consolidado')->id ?? 0;

        return [
            'cliente' => ['required','exists:clientes,id'],
            'numero'  => ['required','unique:consolidados,numero,' . $consolidado_id],
            'tarimas' => ['required','numeric'],
            'cerrado' => ['sometimes', 'boolean'],
            'notas'   => 'nullable',
        ];
    }

    public function messages()
    {
        return array(
            'cliente.required' => __('Selecciona el cliente'),
            'cliente.exists'   => __('Selecciona un cliente válido'),
            'numero.required'  => __('Escribe el número de consolidado'),
            'numero.unique'    => __('Escribe un número de consolidado diferente'),
            'tarimas.required' => __('Escribe la cantidad de tarimas'),
            'tarimas.numeric'  => __('Escribe la número de tarimas'),
        );
    }
}
