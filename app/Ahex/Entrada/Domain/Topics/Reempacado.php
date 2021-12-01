<?php

namespace App\Ahex\Entrada\Domain\Topics;

trait Reempacado
{
    public function reempacador()
    {
        return $this->belongsTo(\App\Reempacador::class)->withTrashed();
    }

    public function codigor()
    {
        return $this->belongsTo(\App\Codigor::class)->withTrashed();
    }
    
    public function hasReempacador()
    {
        if(! isset($this->reempacador_id) )
            return false;
        
        return $this->reempacador instanceof \App\Reempacador;
    }

    public function hasCodigor()
    {
        if(! isset($this->codigor_id) )
            return false;
        
        return $this->codigor instanceof \App\Codigor;
    }

    public function hasFechaReempacado()
    {
        return isset($this->reempacado_fecha);
    }

    public function hasHoraReempacado()
    {
        return isset($this->reempacado_hora);
    }

    public function hasFechaHoraReempacado()
    {
        return $this->hasFechaReempacado() && $this->hasHoraReempacado();
    }

    public function hasReempacado()
    {
        return $this->hasReempacador() && $this->hasCodigor() && $this->hasFechaHoraReempacado();
    }

    public function hasAnyReempacado()
    {
        return $this->hasReempacador() || $this->hasCodigor() || $this->hasFechaHoraReempacado();
    }

    public function getFechaReempacado(bool $cast = true)
    {
        if(! $this->hasFechaReempacado() )
            return '';

        return $cast ? $this->reempacado_fecha->format('d M, Y') : $this->getRawOriginal('reempacado_fecha');
    }

    public function getHoraReempacado(bool $cast = true)
    {
        if(! $this->hasHoraReempacado() )
            return '';
        
        return $cast ? $this->reempacado_hora->format('g:i a') : $this->getRawOriginal('reempacado_hora');
    }

    public function getFechaHoraReempacado(bool $cast = true, $separator = ' ')
    {
        if(! $this->hasFechaHoraReempacado() )
            return '';

        return $this->getFechaReempacado($cast) . $separator . $this->getHoraReempacado($cast);
    }
}
