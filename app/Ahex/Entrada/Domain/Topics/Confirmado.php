<?php

namespace App\Ahex\Entrada\Domain\Topics;

trait Confirmado
{
    public function hasConfirmador()
    {
        if(! isset($this->confirmado_by) )
            return false;

        return $this->confirmador instanceof \App\User;
    }

    public function hasFechaHoraConfirmado()
    {
        return isset($this->confirmado_at);
    }

    public function hasConfirmado()
    {
        return $this->hasConfirmador() && $this->hasFechaHoraConfirmado();
    }
    
    public function getFechaHoraConfirmado(bool $cast = true)
    {
        if(! $this->hasFechaHoraConfirmado() )
            return '';

        return $cast ? $this->confirmado_at->format('d M, Y g:i a') : $this->getRawOriginal('confirmado_at');
    }
}
