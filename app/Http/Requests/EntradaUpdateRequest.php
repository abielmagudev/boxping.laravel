<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Ahex\Entrada\Application\UpdateCalled\Updaters\UpdatersContainer;
use App\Ahex\Entrada\Application\UpdateCalled\Validators\ValidatorsContainer;

class EntradaUpdateRequest extends FormRequest
{
    private $validator_rules;
    private $validator_messages;

    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->validator_rules = [
            'actualizar' => 'bail|required|in:' . implode(',', UpdatersContainer::names()),
        ];

        $this->validator_messages = [
            'actualizar.required' => 'Selecciona un editor de la entrada.',
            'actualizar.in' => 'Selecciona un editor válido para la entrada.',
        ];

        if( $validator = ValidatorsContainer::get($this->actualizar, $this->entrada) )
        {
            $this->validator_rules    = array_merge($this->validator_rules, $validator->rules());
            $this->validator_messages = array_merge($this->validator_rules, $validator->messages());
        }
    }

    public function rules()
    {
        return $this->validator_rules;
    }

    public function messages()
    {
        return $this->validator_messages;
    }
}
