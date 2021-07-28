<?php 

namespace App\Ahex\Entrada\Domain;

use App\Destinatario;

Trait ConditionsTrait
{
    public function hasConsolidado()
    {
        return (bool) ! is_null($this->consolidado_id);
    }

    public function haveDestinatario()
    {
        return (bool) Destinatario::withTrashed()->where('id', $this->destinatario_id)->exists();
    }

    public function haveConfirmacion()
    {
        return (bool) is_string($this->confirmado_at);
    }

    public function haveSalida()
    {
        return (bool) isset($this->salida);
    }
}
