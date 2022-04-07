<?php

namespace App\Ahex\Entrada\Application\IndexCalled\Filtered;

use Illuminate\Http\Request;

abstract class ZFiltered
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    abstract public function title(): string;

    abstract public function content(): string;
}
