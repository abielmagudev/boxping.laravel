<?php

namespace App\Http\Requests\Entrada;

use Illuminate\Foundation\Http\FormRequest;
use App\Ahex\Entrada\Application\UpdateCalled\GrandValidator;

class UpdateRequest extends FormRequest
{
    private $grand_validator;

    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->grand_validator = new GrandValidator($this);
    }

    public function rules()
    {
        return $this->grand_validator->rules;
    }

    public function messages()
    {
        return $this->grand_validator->messages;
    }
}
