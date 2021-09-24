<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Salida;

class SalidaSaveRequest extends FormRequest
{
    private $salida_id;
    private $all_coberturas;
    private $all_status;
    private $rules_added = [];

    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->salida_id = $this->route('salida')->id ?? 0;
        $this->all_coberturas = implode(',', Salida::getAllCoberturasNombres());
        $this->all_status = implode(',', Salida::getAllStatusNombres());
        $this->addRules();
    }

    protected function addRules()
    {
        if( $this->isMethod('post') )
            $this->rules_added['entrada'] = ['bail','exists:entradas,id','unique:salidas,entrada_id'];

        if( $this->isMethod('patch') || $this->isMethod('put') )
        {
            $this->rules_added['status']     = ['required','in:' . $this->all_status];
            $this->rules_added['incidentes'] = ['nullable','array'];
            $this->rules_added['notas']      = 'nullable';
        }
        
        // $this->method(): Return http method
    }

    public function rules()
    {
        return array_merge($this->rules_added, [
            'transportadora' => ['required','exists:transportadoras,id'],
            'rastreo'        => ['nullable','unique:salidas,rastreo,' . $this->salida_id],
            'confirmacion'   => ['nullable','unique:salidas,confirmacion,' . $this->salida_id],
            'cobertura'      => ['required','in:' . $this->all_coberturas],
            'direccion'      => ['nullable','required_if:cobertura,ocurre'],
            'postal'         => ['nullable','required_if:cobertura,ocurre'],
            'ciudad'         => ['nullable','required_if:cobertura,ocurre'],
            'estado'         => ['nullable','required_if:cobertura,ocurre'],
            'pais'           => ['nullable','required_if:cobertura,ocurre'],
        ]);
    }

    public function messages()
    {
        return [
            'entrada.exists'          => __('Selecciona una entrada válida'),
            'entrada.unique'          => __('Entrada ya contiene una guía de salida'),
            'transportadora.required' => __('Selecciona la transportadora'),
            'transportadora.exists'   => __('Selecciona una transportadora válida'),
            'rastreo.unique'          => __('Escribe un código de rastreo diferente'),
            'confirmacion.unique'     => __('Escribe un códifo de confirmación diferente'),
            'cobertura.required'      => __('Selecciona el tipo de cobertura'),
            'cobertura.in'            => __('Selecciona un tipo válido de cobertura'),
            'direccion.required_if'   => __('Escribe la dirección de ocurre'),
            'postal.required_if'      => __('Escribe la postal de ocurre'),
            'ciudad.required_if'      => __('Escribe la ciudad de ocurre'),
            'estado.required_if'      => __('Escribe el estado de ocurre'),
            'pais.required_if'        => __('Escribe el pais de ocurre'),
            'status.required'         => __('Selecciona el tipo de status'),
            'status.in'               => __('Selecciona un tipo válido de status'),
            'incidentes.array'        => __('Desactiva o selecciona incidentes válidos'),
        ];
    }
}
