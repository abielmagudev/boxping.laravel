<?php 

namespace App\Ahex\Entrada\Application;

use App\Entrada;
use App\Consolidado;
use App\Cliente;

use App\Ahex\Zkeleton\Application\PropertySetter;

Class CastViewEdit extends PropertySetter
{
    private $entrada;
    public $template;
    public $data;

    public function __construct($edit_form, Entrada $entrada)
    {
        $this->entrada = $entrada;
        $this->setProps($edit_form);
    }

    private function setProps($edit_form)
    {
        switch($edit_form)
        {
            case 'reempaque':
                return $this->setReempaqueForm();
                break;

            case 'cruce':
                return $this->setCruceForm();
                break;

            default:
                return $this->setEntradaForm();
        }
    }

    private function setReempaqueForm()
    {  
        $this->set('template', 'entradas.edit.reempaque');

        $this->set('data', [
            'entrada' => $this->entrada,
            'codigosr' => \App\Codigor::all(),
            'reempacadores' => \App\Reempacador::all(),
        ]);
    }

    private function setCruceForm()
    {
        $this->set('template', 'entradas.edit.cruce');

        $this->set('data', [
            'entrada' => $this->entrada,
            'vehiculos' => \App\Vehiculo::all(),
            'conductores' => \App\Conductor::all(),
        ]);
    }

    private function setEntradaForm()
    {
        $this->set('template', 'entradas.edit.entrada');

        $this->set('data', [
            'entrada' => $this->entrada,
            'clientes' => Cliente::all(['id','nombre','alias']),
            'consolidado' => $this->entrada->consolidado,
        ]);
    }
}
