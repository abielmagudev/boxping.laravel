<?php

namespace App\Ahex\Entrada\Application\Update\Validators;

class ConfirmacionValidator extends Validator
{
    public function rules(): array
    {
        return [
            'confirmado' => ['required','accepted'],
        ];
    }

    public function messages(): array
    {
        return [
            'confirmado.required' => __('Activa la opción de verificación'),
            'confirmado.accepted' => __('Activa la opción válida de verificación'),
        ];
    }
}
