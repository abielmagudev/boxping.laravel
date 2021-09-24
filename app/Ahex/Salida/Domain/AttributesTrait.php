<?php

namespace App\Ahex\Salida\Domain;

trait AttributesTrait
{
    public function getStatusColorAttribute()
    {
        return static::$all_status[$this->status]['color'];
    }

    public function getStatusDescripcionAttribute()
    {
        return static::$all_status[$this->status]['descripcion'];
    }

    public function getCoberturaDescripcionAttribute()
    {
        return static::$all_coberturas[$this->cobertura]['descripcion'];
    }

    public function getLocalidadAttribute()
    {
        $filtered = array_filter([$this->ciudad, $this->estado, $this->pais]);
        return implode(', ', $filtered);
    }

    public function getDomicilioStickerAttribute()
    {
        return "{$this->direccion}<br>
                Postal {$this->postal}<br>
                {$this->localidad}";
    }

    public function getIncidentesImploded($glue = '<br>')
    {
        return $this->incidentes->implode('nombre', $glue);
    }



    /** Statics */
    public static function getAllStatus($return_object = false)
    {
        return $return_object ? (object) static::$all_status : static::$all_status;
    }

    public static function getAllStatusNombres()
    {
        return array_keys( static::$all_status );
    }

    public static function getAllCoberturas($return_object = false)
    {
        return $return_object ? (object) static::$all_coberturas : static::$all_coberturas;
    }

    public static function getAllCoberturasNombres()
    {
        return array_keys( static::$all_coberturas );
    }
}
