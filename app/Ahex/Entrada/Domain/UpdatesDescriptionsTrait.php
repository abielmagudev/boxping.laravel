<?php

namespace App\Ahex\Entrada\Domain;

trait UpdatesDescriptionsTrait
{
    protected $descriptions = [
        'cliente_id' => 'clienteUpdateDescription', 
        'codigor_id' => 'codigorUpdateDescription',
        'conductor_id' => 'conductorUpdateDescription',
        'confirmado_at' => 'confirmadoUpdateDescription',
        'consolidado_id' => 'consolidadoUpdateDescription',
        'contenido' => 'contenidoUpdateDescription',
        'destinatario_id' => 'destinatarioUpdateDescription',
        'importado_fecha' => 'importadoFechaUpdateDescription',
        'importado_hora' => 'importadoHoraUpdateDescription',
        'numero_cruce' => 'numeroCruceUpdateDescription',
        'numero' => 'numeroUpdateDescription',
        'reempacado_fecha' => 'reempacadoFechaUpdateDescription',
        'reempacado_hora' => 'reempacadoHoraUpdateDescription',
        'reempacador_id' => 'reempacadorUpdateDescription',
        'remitente_id' => 'remitenteUpdateDescription',
        'vehiculo_id' => 'vehiculoUpdateDescription',
    ];

    private function numeroUpdateDescription()
    {
        return "actualizó número {$this->getOriginal('numero')} a {$this->numero}";
    }

    private function consolidadoUpdateDescription()
    {
        if( is_null($this->getOriginal('consolidado_id')) )
            return "agregó al consolidado {$this->consolidado->numero}";

        $consolidated_previous = \App\Consolidado::find( $this->getOriginal('consolidado_id') );

        if( is_null($this->consolidado_id) )
            return "eliminó del consolidado {$consolidated_previous->numero}";
        
        return "actualizó de consolidado {$consolidated_previous->numero} a {$this->consolidado->numero}";
    }

    private function clienteUpdateDescription()
    {
        $cliente_previous = \App\Cliente::find( $this->getOriginal('cliente_id') );
        return "actualizó cliente {$cliente_previous->nombre} a {$this->cliente->nombre}";
    }

    private function contenidoUpdateDescription()
    {
        $contenido_previous = $this->getOriginal('contenido') ?? '';
        return "actualizó el contenido: \"{$this->contenido}\"";
    }

    private function remitenteUpdateDescription()
    {
        if( is_null($this->getOriginal('remitente_id')) )
            return "actualizó remitente {$this->remitente->nombre}";

        $remitente_previous = \App\Remitente::find($this->getOriginal('remitente_id'));
        return "cambió remitente {$remitente_previous->nombre} a {$this->remitente->nombre}";
    }

    private function destinatarioUpdateDescription()
    {
        if( is_null($this->getOriginal('destinatario_id')) )
            return "actualizó destinatario {$this->destinatario->nombre}";

        $destinatario_previous = \App\Destinatario::find($this->getOriginal('destinatario_id'));
        return "cambió destinatario {$destinatario_previous->nombre} a {$this->destinatario->nombre}";
    }

    private function conductorUpdateDescription()
    {
        if( is_null($this->getOriginal('conductor_id')) )
            return "actualizó conductor {$this->conductor->nombre}";

        $conductor_previous = \App\Conductor::find($this->getOriginal('conductor_id'));
        return "cambió conductor {$conductor_previous->nombre} a {$this->conductor->nombre}";
    } 

    private function vehiculoUpdateDescription()
    {
        if( is_null($this->getOriginal('vehiculo_id')) )
            return "actualizó vehiculo {$this->vehiculo->alias}";

        $vehiculo_previous = \App\Vehiculo::find($this->getOriginal('vehiculo_id'));
        return "cambió vehiculo {$vehiculo_previous->alias} a {$this->vehiculo->alias}";
    } 

    private function numeroCruceUpdateDescription()
    {
        $numero_cruce_previous = $this->getOriginal('numero_cruce') ?? '0';
        return "actualizó número de cruce {$numero_cruce_previous} a {$this->numero_cruce}";
    } 

    private function reempacadorUpdateDescription()
    {
        if( is_null($this->getOriginal('reempacador_id')) )
            return "actualizó reempacador {$this->reempacador->nombre}";

        $reempacador_previous = \App\Reempacador::find($this->getOriginal('reempacador_id'));
        return "cambió reempacador {$reempacador_previous->nombre} a {$this->reempacador->nombre}";
    } 

    private function codigorUpdateDescription()
    {
        if( is_null($this->getOriginal('codigor_id')) )
            return "actualizó código de reempacado {$this->codigor->nombre}";

        $codigor_previous = \App\Codigor::find($this->getOriginal('codigor_id'));
        return "cambió código de reempacado {$codigor_previous->nombre} a {$this->codigor->nombre}";
    } 

    private function confirmadoUpdateDescription()
    {
        if( ! is_null($this->confirmado_at) )
            return "confirmó el destinatario {$this->destinatario->nombre}";

        return "solicita confirmación del destinatario {$this->destinatario->nombre}";
    } 

    private function importadoFechaUpdateDescription()
    {
        $importacion_fecha_previous = ! is_null( $this->getOriginal('importado_fecha') )
                                    ? $this->getOriginal('importado_fecha') 
                                    : '?';

        return "actualizó fecha de importación {$importacion_fecha_previous} a {$this->importado_fecha}";
    }

    private function importadoHoraUpdateDescription()
    {
        $importacion_hora_previous = ! is_null( $this->getOriginal('importado_hora') ) 
                                    ? $this->getOriginal('importado_hora')
                                    : '?';

        return "actualizó hora de importación {$importacion_hora_previous} a {$this->importado_hora}";
    } 

    private function reempacadoFechaUpdateDescription()
    {
        $reempacado_fecha_previous = ! is_null( $this->getOriginal('reempacado_fecha') )
                                    ? $this->getOriginal('reempacado_fecha')
                                    : '?';

        return "actualizó fecha de reempacado {$reempacado_fecha_previous} a {$this->reempacado_fecha}";
    }

    private function reempacadoHoraUpdateDescription()
    {
        $reempacado_hora_previous = ! is_null($this->getOriginal('reempacado_hora')) 
                                    ? $this->getOriginal('reempacado_hora')
                                    : '?';

        return "actualizó hora de reempacado {$reempacado_hora_previous} a {$this->reempacado_hora}";
    }
}
