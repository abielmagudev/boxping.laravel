<?php

namespace App\Ahex\Entrada\Domain;

Trait AttributesTrait
{
    public function getImportadoHorarioAttribute()
    {
        if( is_null($this->importado_fecha) && is_null($this->importado_hora) )
            return '';

        return date('h:i a', strtotime($this->importado_hora)) . ', ' . date('d M,Y', strtotime($this->importado_fecha));
    }

    public function getImportadoAtAttribute()
    {
        return $this->importado_fecha . ' ' . $this->importado_hora;
    }

    public function getReempacadoHorarioAttribute()
    {
        if( is_null($this->reempacado_fecha) && is_null($this->reempacado_hora) )
            return '';

        return date('h:i a', strtotime($this->reempacado_hora)) . ', ' . date('d M,Y', strtotime($this->reempacado_fecha));
    }

    public function getReempacadoAtAttribute()
    {
        return $this->reempacado_fecha . ' ' .$this->reempacado_hora;
    }

    public function getConfirmadoAttribute()
    {
        return is_integer($this->confirmado_by) && is_string($this->confirmado_at);
    }
}
