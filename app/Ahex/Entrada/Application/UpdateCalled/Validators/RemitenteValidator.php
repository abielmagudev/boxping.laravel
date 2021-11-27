<?php

namespace App\Ahex\Entrada\Application\UpdateCalled\Validators;

class RemitenteValidator extends Validator
{
    public function rules(): array
    {
        return [
            'remitente' => ['required', 'exists:remitentes,id']
        ];
    }

    public function messages(): array
    {
        return [
            'remitente.required' => 'Selecciona un remitente válido.',
            'remitente.exists'   => 'Selecciona un remitente existente.',
        ];
    }
}
