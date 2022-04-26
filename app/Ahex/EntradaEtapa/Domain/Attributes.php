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

    public function getLecturaPesajeAttribute()
    {
        return ($this->peso ?? '0') . $this->medicion_peso;
    }

    public function getLecturaVolumenAttribute()
    {
        return "{$this->largo} x {$this->ancho} x {$this->alto}{$this->medicion_volumen}";
    }

    public function getLecturaPesajeVolumenAttribute()
    {
        return "{$this->lectura_pesaje} {$this->lectura_volumen}";
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
