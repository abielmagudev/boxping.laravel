<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Consolidado;

class EntradaCreateRequest extends FormRequest
{
    /**
     * 
     * Si existe el consolidado-id obtenido del request,
     * modifica la redireccion(redirect) para el momento de falla de las validaciones,
     * significa que se intenta crear una entrada consolidada.
     * 
     * Si no existe el consolidado-id en el request, 
     * mantiene la redireccion para su validacion,
     * significa que se intenta crear una entrada sin consolidar.
     * 
     * @change redirect
     * 
     */
    public function prepareForValidation()
    {
        if( Consolidado::where('id', $this->consolidado)->exists() ) 
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
