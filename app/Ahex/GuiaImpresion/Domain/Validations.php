<?php

namespace App\Ahex\GuiaImpresion\Domain;

trait Validations
{
    public static function existsActivada($value)
    {
        return self::where('id', $value)->where('activada', 1)->exists();
    }

    public static function existsDesactivada($value)
    {
        return self::where('id', $value)->where('activada', 0)->exists();
    }

    public function isReal()
    {
        return isset($this->id);
    }

    public function hasDescripcion()
    {
        return isset($this->descripcion);
    }

    public function isDesactivada()
    {
        return ! (bool) $this->activada;
    }

    public function isActivada()
    {
        return (bool) $this->activada;
    }

    public function hasInformacion(string $prop = null)
    {
        if(! is_string($prop) )
            return isset($this->informacion);
        
        return isset($this->informacion->{$prop});
    }

    public function hasInformacionFinal()
    {
        return isset($this->informacion_final);
    }
    
    public function hasTipoDescripcion($type = null)
    {
        if(! isset($type) )
            return isset($this->tipo_descripcion_informacion);

        return $this->tipo_descripcion_informacion === $type;
    }

    /**
     * 
     * Valida si el valor de informacion_encoded es un formato JSON correcto.
     * 
     * @json_decode: Ejecuta la decodificación del informacion_encoded, con @ ignora cualquier error de PHP.
     * json_last_error: Compara si el último error es igual a NINGUNO al momento de decodificar el valor.
     * 
     * https://www.php.net/manual/en/function.json-last-error.php
     * 
     * @return bool
     */
    public function hasValidateInformacionJson()
    {
        @json_decode( $this->informacion_encoded );
        return (json_last_error() === JSON_ERROR_NONE);
    }
}
