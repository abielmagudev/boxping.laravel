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
        # if( $this->has('consolidado') )
        #    $this->redirect = route('consolidados.show', $this->consolidado);
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
