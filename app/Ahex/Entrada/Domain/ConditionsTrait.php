<?php 

namespace App\Ahex\Entrada\Domain;

Trait ConditionsTrait
{
    public function hasConsolidado()
    {
        return (bool) ! is_null($this->consolidado_id);
    }
}