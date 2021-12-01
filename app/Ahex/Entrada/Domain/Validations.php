<?php 

namespace App\Ahex\Entrada\Domain;

trait Validations
{
    public function hasActualizaciones($uploaded_updates = false)
    {
        if( $uploaded_updates )
            return (bool) $this->actualizaciones->count();

        return (bool) $this->loadCount('actualizaciones')->actualizaciones_count;
    }

    public function hasComentarios($uploaded_comments = false)
    {
        if( $uploaded_comments )
            return (bool) $this->comentarios->count();

        return (bool) $this->loadCount('comentarios')->comentarios_count;
    }

    public function hasEtapas()
    {
        return (bool) $this->etapas->count();
    }

    public function hasContenido()
    {
        return isset($this->contenido);
    }

    public function hasCliente()
    {
        if(! isset($this->cliente_id) )
            return false;

        return is_a($this->cliente, \App\Cliente::class);
    }

    public function hasConsolidado()
    {
        if(! isset($this->consolidado_id) )
            return false;

        return is_a($this->consolidado, \App\Consolidado::class);
    }

    public function hasDestinatario()
    {
        if(! isset($this->destinatario_id) )
            return false;

        return is_a($this->destinatario, \App\Destinatario::class);
    }

    public function hasRemitente()
    {
        if(! isset($this->remitente_id) )
            return false;

        return is_a($this->remitente, \App\Remitente::class);
    }

    public function hasSalida()
    {
        return $this->salida instanceof \App\Salida;
    }
}
