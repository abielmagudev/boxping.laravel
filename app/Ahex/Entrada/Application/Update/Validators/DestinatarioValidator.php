<?php

namespace App\Ahex\Entrada\Application\Update\Validators;

class DestinatarioValidator extends Validator
{
    public function rules(): array
    {
        return [
            'destinatario' => ['required', 'exists:destinatarios,id']
        ];
    }

    public function messages(): array
    {
        return [
            'destinatario.required' => 'Selecciona un destinatario válido.',
            'destinatario.exists'   => 'Selecciona un destinatario existente.',
        ];
    }
}
