<?php

namespace App\Ahex\Entrada\Application\Edit\Editors;

use App\Entrada;

abstract class Editor
{
    const METHOD_NOT_EXISTS_RETURN_NULL = null;

    public $template = null;

    public $entrada;

    public function __construct(Entrada $entrada)
    {
        $this->entrada = $entrada;
    }

    public function __get($property)
    {
        if( ! method_exists($this, $property) )
            return self::METHOD_NOT_EXISTS_RETURN_NULL;

        return call_user_func([$this, $property]);
    }

    abstract public function data(): array;
}
