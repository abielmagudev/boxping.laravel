<?php

namespace App\Ahex\Entrada\Application\UpdateMultipleCalled;

use App\Entrada;
use App\Cliente;

class ClienteUpdater extends UpdaterMultiple
{
    public $name = 'cliente';

    public $invalid_message = 'Cliente no existe para la actualización de las entradas';

    public function validate():bool
    {
        return Cliente::exists($this->value);
    }

    public function values():array
    {
        return [
            'cliente_id' => $this->value
        ];
    }

    public function update(array $entradas_id)
    {
        return Entrada::whereNull('consolidado_id')->whereIn('id', $entradas_id)->update( $this->values() );
    }
}
