<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Consolidado;

class ConsolidadoSaveRequest extends FormRequest
{
    private $consolidado_id;
    private $consolidado_all_status;

    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->consolidado_id = $this->route('consolidado')->id ?? 0;
        $this->consolidado_all_status = implode(',', Consolidado::allStatusNames());
    }

    public function rules()
    {
        return [
            'cliente' => ['required','exists:clientes,id'],
            'numero'  => ['required','unique:consolidados,numero,' . $this->consolidado_id],
            'tarimas' => ['required','numeric'],
            'status'  => ['in:' . $this->consolidado_all_status],
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
            'status.in'        => __('Selecciona un status válido'),
        );
    }
}
