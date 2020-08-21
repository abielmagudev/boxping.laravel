<?php

namespace App\Http\Controllers\Extended\Abstracts;

abstract class Editor
{
    abstract public function template();
    abstract public function resources();
    
    public function view()
    {
        return view($this->template(), $this->resources());
    }
}
