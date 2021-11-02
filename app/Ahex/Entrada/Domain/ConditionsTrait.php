<?php 

namespace App\Ahex\Entrada\Domain;

use App\Consolidado;
use App\Destinatario;

Trait ConditionsTrait
{
    public function issetConsolidado()
    {
        return (bool) is_int($this->consolidado_id);
    }

    public function hasConsolidado()
    {
        return (bool) is_int($this->consolidado_id);
    }

    public function hasCliente()
    {
        return (bool) is_int($this->cliente_id);
    }

    public function hasDestinatario()
    {
        return (bool) is_int($this->destinatario_id);
    }

    public function haveConsolidado()
    {
        return (bool) Consolidado::where('id', $this->consolidado_id)->exists();
    }

    public function haveDestinatario()
    {
        return (bool) Destinatario::withTrashed()->where('id', $this->destinatario_id)->exists();
    }

    public function haveConfirmacion()
    {
        return (bool) is_int($this->confirmado_by) && isset($this->confirmado_at);
    }

    public function haveSalida()
    {
        return (bool) isset($this->salida);
    }
}
