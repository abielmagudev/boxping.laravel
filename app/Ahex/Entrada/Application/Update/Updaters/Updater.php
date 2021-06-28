<?php

namespace App\Ahex\Entrada\Application\Update\Updaters;

use App\Http\Requests\EntradaUpdateRequest as UpdateRequest;
use App\Entrada;

abstract class Updater
{
    protected $entrada;
    protected $request;
    protected $validated;
    protected $prepared;
    protected $redirect;

    public function __construct(UpdateRequest $request, Entrada $entrada)
    {
        $this->entrada = $entrada;
        $this->request = $request;
        $this->validated = $this->validate();
        $this->prepared = $this->prepare();
    }

    public function validate()
    {
        return $this->request->validate($this->rules(), $this->messages());
    }

    public function save()
    {
        return $this->entrada->fill( $this->prepared )->save();
    }

    abstract public function rules();

    abstract public function messages();

    abstract public function prepare();
    
    abstract public function redirect();

    abstract public function failure();

    abstract public function success();
}
