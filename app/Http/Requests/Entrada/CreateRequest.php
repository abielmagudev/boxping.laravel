<?php

namespace App\Http\Requests\Entrada;

use Illuminate\Foundation\Http\FormRequest;
use App\Consolidado;

class CreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'consolidado' => $this->route()->parameter('consolidado'),
        ]);
    }

    public function rules()
    {        
        return [
            'consolidado' => ['nullable','exists:consolidados,id,status,abierto'],
        ];
    }

    public function messages()
    {
        return [
            'consolidado.exists' => __('Requiere un consolidado válido y abierto para agregar una nueva entrada'),
        ];
    }
}
