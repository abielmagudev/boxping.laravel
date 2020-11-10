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

    public function getImportadoHorarioAttribute()
    {
        if( is_null($this->importado_fecha) && is_null($this->importado_hora) )
            return '';

        return date('h:i a', strtotime($this->importado_hora)) . ', ' . date('d M,Y', strtotime($this->importado_fecha));
    }

    public function getReempacadoHorarioAttribute()
    {
        if( is_null($this->reempacado_fecha) && is_null($this->reempacado_hora) )
            return '';

        return date('h:i a', strtotime($this->reempacado_hora)) . ', ' . date('d M,Y', strtotime($this->reempacado_fecha));
    }

    public function getConfirmadoAttribute()
    {
        return is_integer($this->confirmado_by) && is_string($this->confirmado_at);
    }
}