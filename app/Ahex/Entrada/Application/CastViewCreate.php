<?php 

namespace App\Ahex\Entrada\Application;

use App\Entrada;
use App\Consolidado;
use App\Cliente;

use App\Ahex\Zkeleton\Application\PropertySetter;

Class CastViewCreate extends PropertySetter
{
    public $template;
    public $data;

    public function __construct($consolidado_id)
    {
        $this->setProps($consolidado_id);
    }

    private function setProps($consolidado_id)
    {
        if( ! $consolidado_id )
            return $this->setSinConsolidado();

        return $this->setConsolidado($consolidado_id);
    }

    private function setSinConsolidado()
    {
        $this->set('template', 'entradas.create.sin-consolidado');

        $this->set('data', [
            'entrada' => new Entrada,
            'clientes' => Cliente::all(),
            'route_cancel' => route('entradas.index'), 
        ]);
    }

    private function setConsolidado($consolidado_id)
    {
        $this->set('template', 'entradas.create.consolidado');

        $this->set('data', [
            'entrada' => new Entrada,
            'consolidado' => Consolidado::find($consolidado_id),
            'route_cancel' => route('consolidados.show', $consolidado_id),
        ]);
    }
}
