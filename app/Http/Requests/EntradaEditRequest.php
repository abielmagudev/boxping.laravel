<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Ahex\Entrada\Application\Edit\Editors\EditorsContainer;

class EntradaEditRequest extends FormRequest
{
    private $editors;

    public function prepareForValidation()
    {
        $this->editors = EditorsContainer::names();
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'editor' => ['required','in:' . implode(',', $this->editors)]
        ];
    }

    public function messages()
    {
        return array(
            'editor.required' => __('Se requiere una editor válido'),
            'editor.in' => __('Selecciona un editor válido'),
        );
    }
}
