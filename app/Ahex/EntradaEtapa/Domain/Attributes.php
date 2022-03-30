<?php

namespace App\Ahex\EntradaEtapa\Domain;

use App\Etapa;

trait Attributes
{
    public function getListaAlertasHtmlAttribute()
    {
        $alertas = $this->alertas();

        $mapped = $alertas->map( function ($alerta) {
            return "<li class='text-danger'>
                        <span class='text-dark'>{$alerta->nombre}</span>
                    </li>";
        });

        return $mapped->implode('');
    }

    public function getLecturaPesoAttribute()
    {
        return "{$this->peso} {$this->medida_peso}";
    }

    public function getLecturaVolumenAttribute()
    {
        return "{$this->ancho} x {$this->altura} x {$this->largo} {$this->medida_volumen}";
    }

    public function getNombreMedicionPesoAttribute()
    {
        if( ! Etapa::existsMedicionPeso($this->medicion_peso) )
            return Etapa::MEDICION_SIN_NOMBRE;

        return Etapa::nombreMedicionPeso($this->medicion_peso);
    }

    public function getNombreMedicionVolumenAttribute()
    {
        if( ! Etapa::existsMedicionVolumen($this->medicion_volumen) )
            return Etapa::MEDICION_SIN_NOMBRE;

        return Etapa::nombreMedicionVolumen($this->medicion_volumen);
    }
}
