<?php

namespace App\Ahex\Entrada\Domain\Topics;

trait Importado
{
    public function vehiculo()
    {
        return $this->belongsTo(\App\Vehiculo::class)->withTrashed();
    }

    public function conductor()
    {
        return $this->belongsTo(\App\Conductor::class)->withTrashed();
    }
    
    public function hasConductor()
    {
        if(! isset($this->conductor_id) )
            return false;

        return $this->conductor instanceof \App\Conductor;
    }

    public function hasVehiculo()
    {
        if(! isset($this->vehiculo_id) )
            return false;

        return $this->vehiculo instanceof \App\Vehiculo;
    }

    public function hasFechaImportado()
    {
        return isset($this->importado_fecha);
    }

    public function hasHoraImportado()
    {
        return isset($this->importado_hora);
    }

    public function hasFechaHoraImportado()
    {
        return $this->hasFechaImportado() && $this->hasHoraImportado();
    }

    public function hasImportado()
    {
        return $this->hasConductor() && $this->hasVehiculo() && $this->hasFechaHoraImportado();
    }

    public function hasAnyImportado()
    {
        return $this->hasConductor() || $this->hasVehiculo() || $this->hasFechaHoraImportado();
    }

    public function getFechaImportado(bool $cast = true)
    {
        if(! $this->hasFechaImportado() )
            return '';

        return $cast ? $this->importado_fecha->format('d M, Y') : $this->getRawOriginal('importado_fecha');
    }

    public function getHoraImportado(bool $cast = true)
    {
        if(! $this->hasHoraImportado() )
            return '';
        
        return $cast ? $this->importado_hora->format('g:i a') : $this->getRawOriginal('importado_hora');
        // return date('g:i a', strtotime($this->importado_hora)); // RAW PHP
    }

    public function getFechaHoraImportado(bool $cast = true, $separator = ' ')
    {
        if(! $this->hasFechaHoraImportado() )
            return '';

        return $this->getFechaImportado($cast) . $separator . $this->getHoraImportado($cast);
    }
}
