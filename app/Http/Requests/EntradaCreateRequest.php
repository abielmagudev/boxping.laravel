<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaCreateRequest extends FormRequest
{
    public function prepareForValidation()
    {
        if( $this->filled('consolidado') && is_numeric($this->consolidado) ) 
            $this->redirect = route('consolidados.show', $this->consolidado);
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {        
        return [
            'consolidado' => 'exists:consolidados,id,status,abierto',
        ];
    }

    public function messages()
    {
        return [
            'consolidado.exists' => __('Requiere un consolidado válido y abierto para la nueva entrada'),
        ];
    }
}
