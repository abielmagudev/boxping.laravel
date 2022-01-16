<?php

namespace App\Ahex\Salida\Domain;

trait Attributes
{
    // Static props
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
            'descripcion' => 'Domicilio del destinatario',
        ],
        'ocurre' => [
            'descripcion' => 'Sucursal de la transportadora',
        ],
    ];


    // Status
    public static function allStatusConPropiedades(bool $like_object = false)
    {
        return $like_object ? (object) self::$all_status : self::$all_status;
    }

    public static function allStatus(string $glue = null)
    {
        return $glue ? implode($glue, array_keys(self::$all_status)) : array_keys(self::$all_status);
    }

    public static function defaultStatus()
    {
        return array_key_first( self::$all_status );
    }
    
    public function getStatusTituloAttribute()
    {
        return ucfirst($this->status);
    }

    public function getStatusColorAttribute()
    {
        return self::$all_status[$this->status]['color'];
    }

    public function getStatusDescripcionAttribute()
    {
        return self::$all_status[$this->status]['descripcion'];
    }


    // Cobertura
    public static function allCoberturasConDescripciones(bool $like_object = false)
    {
        return $like_object ? (object) self::$all_coberturas : self::$all_coberturas;
    }

    public static function allCoberturas(string $glue = null)
    {
        return $glue ? implode($glue, array_keys(self::$all_coberturas)) : array_keys(self::$all_coberturas);
    }
    
    public static function defaultCobertura()
    {
        return array_key_first( self::$all_coberturas );
    }

    public function getCoberturaDescripcionAttribute()
    {
        return self::$all_coberturas[$this->cobertura]['descripcion'];
    }

    
    // Attributes
    public function getLocalidadAttribute()
    {
        $filtered = array_filter([$this->ciudad, $this->estado, $this->pais]);
        return implode(', ', $filtered);
    }

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
}
