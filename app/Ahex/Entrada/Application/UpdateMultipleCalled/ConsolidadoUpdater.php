<?php

namespace App\Ahex\Entrada\Application\UpdateMultipleCalled;

use App\Entrada;
use App\Consolidado;

class ConsolidadoUpdater extends UpdaterMultiple
{
    public $name = 'consolidado';

    public $invalid_message = 'Consolidado no existe ó status cerrado para la selección de entradas';

    public function validate():bool
    {
        return Consolidado::isAbierto($this->value) || is_null($this->value);
    }

    public function values():array
    {
        if( $consolidado = Consolidado::findByNumero($this->value) )
            return [
                'cliente_id' => $consolidado->cliente_id,
                'consolidado_id' => $consolidado->id,
            ];

        return [
            'consolidado_id' => null,
        ];
    }

    public function update(array $entradas_id)
    {
        return Entrada::whereIn('id', $entradas_id)->update( $this->values() );
    }
}
