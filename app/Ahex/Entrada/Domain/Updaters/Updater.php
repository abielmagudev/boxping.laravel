<?php

namespace App\Ahex\Entrada\Domain\Updaters;

Abstract class Updater
{
    protected $entrada;
    protected $data;

    abstract public function validate( object $request);
    abstract public function fill( array $validated);
    abstract public function message( bool $saved);

    public function save()
    {
        $data = $this->data;
        return $this->entrada->fill( $data )->save();
    }
}
