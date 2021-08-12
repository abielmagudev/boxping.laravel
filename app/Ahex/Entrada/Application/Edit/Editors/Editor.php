<?php

namespace App\Ahex\Entrada\Application\Edit\Editors;

use App\Entrada;

abstract class Editor
{
    const METHOD_NOT_EXISTS = null;

    public $template = null;

    public $entrada;

    public function __construct(Entrada $entrada)
    {
        $this->entrada = $entrada;
    }

    public function __get($property_call_method)
    {
        if( ! method_exists($this, $property_call_method) )
            return self::METHOD_NOT_EXISTS;

        return call_user_func([$this, $property_call_method]);
    }

    abstract public function data(): array;
}
