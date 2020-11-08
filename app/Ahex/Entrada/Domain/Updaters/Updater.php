<?php

namespace App\Ahex\Entrada\Domain\Updaters;

Abstract class Updater
{
    public $redirect;
    protected $entrada;

    public function __construct($entrada)
    {
        $this->entrada = $entrada;
    }

    abstract public function rules();

    abstract public function messages();

    abstract public function prepare(array $validated);

    abstract public function notification(bool $saved = true);
}
