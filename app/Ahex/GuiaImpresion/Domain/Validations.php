<?php

namespace App\Ahex\GuiaImpresion\Domain;

trait Validations
{
    public static function existsAndActived($value, $column = 'id')
    {
        return self::where($column, $value)->where('activada', 1)->exists();
    }

    public function isReal()
    {
        return isset($this->id);
    }

    public function hasDescripcion()
    {
        return isset($this->descripcion);
    }

    public function hasTextoFinal()
    {
        return isset($this->texto_final);
    }

    public function isDesactivada()
    {
        return ! (bool) $this->activada;
    }

    public function isActivada()
    {
        return (bool) $this->activada;
    }

    public function hasContenido(string $prop = null)
    {
        if(! is_string($prop) )
            return isset($this->contenido);
        
        return isset($this->contenido->{$prop});
    }

    /**
     * 
     * Valida si el valor de contenido_encoded es un formato JSON correcto.
     * 
     * @json_decode: Ejecuta la decodificación del contenido_encoded, con @ ignora cualquier error de PHP.
     * json_last_error: Compara si el último error es igual a NINGUNO al momento de decodificar el valor.
     * 
     * https://www.php.net/manual/en/function.json-last-error.php
     * 
     * @return bool
     */
    public function hasValidateContenidoJson()
    {
        @json_decode( $this->contenido_encoded );
        return (json_last_error() === JSON_ERROR_NONE);
    }
}
