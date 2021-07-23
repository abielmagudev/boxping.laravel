<?php

namespace App\Ahex\Salida\Domain;

trait AttributesTrait{
    public function getIncidentesHtmlAttribute()
    {
        return $this->incidentes->implode('titulo', '<br>');
    }

    public function getMostrarStatusAttribute()
    {
        return ucfirst($this->status);
    }

    public function getMostrarCoberturaAttribute()
    {
        return ucfirst($this->cobertura);
    }

    public function getLocalidadAttribute()
    {
        $filtered = array_filter([$this->ciudad, $this->estado, $this->pais]);
        return implode(', ', $filtered);
    }
}
