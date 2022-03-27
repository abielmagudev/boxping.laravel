<?php

namespace App\Http\Requests\Entrada;

use Illuminate\Foundation\Http\FormRequest;
use App\Ahex\Entrada\Application\EditCalled\EditorsContainer;

class EditRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    /**
     * 
     * Merge the parametes of url(GET) to validate
     * 
     * https://laracasts.com/discuss/channels/general-discussion/how-to-validate-route-parameters-in-laravel-5?page=1
     *
     * @return array
     */
    public function validationData()
    {
        return array_merge($this->all(), $this->route()->parameters());
    }

    public function rules()
    {
        return [
            'editor' => ['required','in:' . EditorsContainer::names(',')],
            'buscar' => ['required_if:editor,destinatario,remitente'],
        ];
    }

    public function messages()
    {
        return array(
            'editor.required' => __('Se requiere una editor válido de la entrada'),
            'editor.in' => __('Selecciona un editor válido de la entrada'),
            'buscar.required_if' => __('Escribe la información a buscar del destinatario ó remitente'),
        );
    }
}
