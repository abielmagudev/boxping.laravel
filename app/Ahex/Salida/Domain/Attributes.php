<?php

namespace App\Ahex\Salida\Domain;

trait Attributes
{
    public static $all_status = [
        'en espera' => [
            'color' => '#0E6FFD',
            'descripcion' => 'Recopilando información para el envio',
        ],
        'en ruta' => [
            'color' => '#FFC108',
            'descripcion' => 'Envio en proceso hacia su destino',
        ],
        'arribo' => [
            'color' => '#198754',
            'descripcion' => 'Finalizo en el envio a su destino',
        ],
        'entregado' => [
            'color' => '#212529',
            'descripcion' => 'Paquete recibido por el destinatario',
        ],
    ];

    public static $all_coberturas = [
        'domicilio' => [
            'descripcion' => 'Dirección del destinatario',
        ],
        'ocurre'    => [
            'descripcion' => 'Dirección de la transportadora',
        ],
    ];

    public function getStatusTituloAttribute()
    {
        return ucfirst($this->status);
    }

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


    /** Bundle */
    public function getDomicilioOcurreAttribute()
    {
        return "{$this->direccion}, Postal {$this->postal} <br> {$this->localidad}";
    }

    public function getDomicilioDestinatarioAttribute()
    {
        return $this->entrada->destinatario->domicilio_completo;
    }

    public function getListaIncidentes($tag = ', ', $html = false)
    {
        if( ! $html )
            return $this->incidentes->implode('nombre', $tag);

        if( $tag === 'br' )
            return $this->incidentes->implode('nombre', '<br>');

        $tagged = $this->incidentes->map( fn($incidente) => "<{$tag}>{$incidente->nombre}</{$tag}>" );
        return $tagged->implode('');
    }


    /** Statics */
    public static function getAllStatus($return_object = false)
    {
        return $return_object ? (object) self::$all_status : self::$all_status;
    }

    public static function getAllStatusNombres()
    {
        return array_keys( self::$all_status );
    }

    public static function getAllCoberturas($return_object = false)
    {
        return $return_object ? (object) self::$all_coberturas : self::$all_coberturas;
    }

    public static function getAllCoberturasNombres()
    {
        return array_keys( self::$all_coberturas );
    }
}
