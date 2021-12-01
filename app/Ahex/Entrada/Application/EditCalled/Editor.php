<?php

namespace App\Ahex\Entrada\Application\EditCalled;

use App\Entrada;
use Illuminate\Http\Request;

abstract class Editor
{
    protected $entrada;
    protected $request;

    public function __construct(Entrada $entrada, Request $request)
    {
        $this->entrada = $entrada;
        $this->request = $request;
    }

    abstract public function template(): string;

    abstract public function data(): array;
}
