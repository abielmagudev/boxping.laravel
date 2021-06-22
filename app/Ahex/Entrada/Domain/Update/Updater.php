<?php

namespace App\Ahex\Entrada\Domain\Update;

use App\Http\Requests\EntradaUpdateRequest as UpdateRequest;
use App\Entrada;

abstract class Updater
{
    protected $request;
    protected $entrada;

    public function __construct(UpdateRequest $request, Entrada $entrada)
    {
        $this->request = $request;
        $this->entrada = $entrada;
    }

    public function validate()
    {
        return $this->request->validate($this->rules(), $this->messages());
    }

    abstract public function rules();

    abstract public function messages();

    abstract public function prepare($data);

    abstract public function save($data);
    
    abstract public function redirect();

    abstract public function failure();

    abstract public function success();
}
