<?php

namespace App\Ahex\Entrada\Application\UpdateCalled\Validators;

abstract class Validator
{
    protected $entrada;

    public function __construct(\App\Entrada $entrada)
    {
        $this->entrada = $entrada;
    }

    abstract public function rules(): array;

    abstract public function messages(): array;
}
