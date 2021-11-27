<?php

namespace App\Ahex\EntradaEtapa\Domain;

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
        if( ! $this->existsNombreMedicionPeso($this->medicion_peso) )
            return self::MEDICION_SIN_NOMBRE;

        return $this->todas_mediciones_peso[$this->medicion_peso];
    }

    public function getNombreMedicionVolumenAttribute()
    {
        if( ! $this->existsNombreMedicionVolumen($this->medicion_volumen) )
            return self::MEDICION_SIN_NOMBRE;

        return $this->todas_mediciones_volumen[$this->medicion_volumen];
    }
}
