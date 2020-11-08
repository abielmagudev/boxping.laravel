<?php

namespace App\Ahex\Entrada\Domain;

Trait AttributesTrait
{
    public function getAliasNumeroAttribute()
    {
        if( $this->cliente_alias_numero )
            return $this->cliente->alias . $this->numero;
        
        return;
    }

    public function getCruceHorarioAttribute()
    {
        if( is_null($this->cruce_fecha) && is_null($this->cruce_hora) )
            return '';

        return date('h:i a', strtotime($this->cruce_hora)) . ', ' . date('d M,Y', strtotime($this->cruce_fecha));
    }

    public function getReempacadoHorarioAttribute()
    {
        if( is_null($this->reempacado_fecha) && is_null($this->reempacado_hora) )
            return '';

        return date('h:i a', strtotime($this->reempacado_hora)) . ', ' . date('d M,Y', strtotime($this->reempacado_fecha));
    }

    public function getHasVerificacionAttribute()
    {
        return is_string($this->verificado_at) && is_integer($this->verificado_by);
    }
}