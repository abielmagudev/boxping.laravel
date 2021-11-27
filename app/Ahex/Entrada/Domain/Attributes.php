<?php 

namespace App\Ahex\Entrada\Domain;

trait Attributes
{
    public function getContenidoHtmlAttribute()
    {
        return nl2br( e($this->contenido) );
    }

    public function getFechaHoraActualizadoAttribute()
    {
        return $this->updated_at->format('d M, Y g:i a');
    }
}
