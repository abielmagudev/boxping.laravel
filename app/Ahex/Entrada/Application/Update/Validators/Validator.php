<?php

namespace App\Ahex\Entrada\Application\Update\Validators;

use App\Entrada;

abstract class Validator
{
    protected $entrada;

    public function __construct(Entrada $entrada)
    {
        $this->entrada = $entrada;
    }

    abstract public function rules(): array;

    abstract public function messages(): array;
}
