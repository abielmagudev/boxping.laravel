<?php

namespace App\Ahex\Salida\Domain;

trait UpdatesDescriptionsTrait
{
    protected $descriptions = [
        'ciudad' => 'ciudadUpdateDescription',
        'cobertura' => 'coberturaUpdateDescription',
        'confirmacion' => 'confirmacionUpdateDescription',
        'direccion' => 'direccionUpdateDescription',
        'estado' => 'estadoUpdateDescription',
        'incidentes' => 'incidentesUpdateDescription',
        'notas' => 'notasUpdateDescription',
        'pais' => 'paisUpdateDescription',
        'postal' => 'postalUpdateDescription',
        'rastreo' => 'rastreoUpdateDescription',
        'status' => 'statusUpdateDescription',
        'transportadora_id' => 'transportadoraUpdateDescription',
    ];

    public function rastreoUpdateDescription()
    {
        if( is_null($this->getOriginal('rastreo')) )
            return "actualizó rastreo: {$this->rastreo}";

        return "actualizó rastreo de {$this->getOriginal('rastreo')} a {$this->rastreo}";
    }

    public function confirmacionUpdateDescription()
    {
        if( is_null($this->getOriginal('confirmacion')) )
            return "actualizó confirmación: {$this->confirmacion}";

        return "actualizó confirmación de {$this->getOriginal('confirmacion')} a {$this->confirmacion}";
    }

    public function coberturaUpdateDescription()
    {
        return "actualizó cobertura de {$this->getOriginal('cobertura')} a {$this->cobertura}";
    }

    public function direccionUpdateDescription()
    {
        if( is_null($this->getOriginal('direccion')) )
            return "actualizó dirección de ocurre a {$this->direccion}";

        return "actualizó dirección de ocurre de {$this->getOriginal('direccion')} a {$this->direccion}";
    }

    public function postalUpdateDescription()
    {
        if( is_null($this->getOriginal('postal')) )
            return "actualizó postal de ocurre a {$this->postal}";

        return "actualizó postal de ocurre de {$this->getOriginal('postal')} a {$this->postal}";
    }

    public function ciudadUpdateDescription()
    {
        if( is_null($this->getOriginal('ciudad')) )
            return "actualizó ciudad de ocurre a {$this->ciudad}";

        return "actualizó ciudad de ocurre de {$this->getOriginal('ciudad')} a {$this->ciudad}";
    }
    
    public function estadoUpdateDescription()
    {
        if( is_null($this->getOriginal('estado')) )
            return "actualizó estado de ocurre a {$this->estado}";

        return "actualizó estado de ocurre de {$this->getOriginal('estado')} a {$this->estado}";
    }

    public function paisUpdateDescription()
    {
        if( is_null($this->getOriginal('pais')) )
            return "actualizó pais de ocurre a {$this->pais}";

        return "actualizó pais de ocurre de {$this->getOriginal('pais')} a {$this->pais}";
    }

    public function notasUpdateDescription()
    {
        if( is_null($this->getOriginal('notas')) )
            return "actualizó notas \"{$this->notas}\"";

        return "actualizó notas de \"{$this->getOriginal('notas')}\" a \"{$this->notas}\"";
    }

    public function statusUpdateDescription()
    {
        if( is_null($this->getOriginal('status')) )
            return "actualizó status {$this->status}";

        return "actualizó status de {$this->getOriginal('status')} a {$this->status}";
    }

    public function transportadoraUpdateDescription()
    {
        if( is_null($this->getOriginal('transportadora_id')) )
            return "actualizó transportadora {$this->transportadora->nombre}";

        $transportadora_prev = \App\Transportadora::find( $this->getOriginal('transportadora_id') );
        return "actualizó transportadora de {$transportadora_prev->nombre} a {$this->transportadora->nombre}";
    }
}
