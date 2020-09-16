<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaCreateRequest extends FormRequest
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
        $this->setRedirect( $this->input('consolidado', false) );

        return [
            'consolidado' => 'exists:consolidados,id,abierto,1',
        ];
    }

    public function messages()
    {
        return array(
            'consolidado.exists' => __('Selecciona un consolidado válido y abierto'),
        );
    }

    private function setRedirect( $with_consolidado )
    {
        if( $with_consolidado ) 
            $this->redirect = route('consolidados.show', $with_consolidado);

        return;
    }
}
