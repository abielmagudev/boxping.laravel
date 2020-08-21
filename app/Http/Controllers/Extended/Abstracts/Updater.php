<?php

namespace App\Http\Controllers\Extended\Abstracts;

abstract class Updater
{
    abstract public function validate();
    abstract protected function assignment();
    abstract public function save();
    abstract public function message($saved);
}
