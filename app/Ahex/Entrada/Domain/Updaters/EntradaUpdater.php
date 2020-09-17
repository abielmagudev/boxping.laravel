<?php

namespace App\Ahex\Entrada\Domain\Updaters;

use App\Entrada;
use App\Consolidado;
use App\Http\Requests\EntradaUpdateRequest;
use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Validation\Rule;

Class EntradaUpdater extends Updater
{
    public function __construct(EntradaUpdateRequest $request, Entrada $entrada)
    {
        $this->entrada = $entrada;
        $this->validate( $request );
        $this->fill( $request->all() );
    }

    public function validate( object $request )
    {
        $consolidado_id = $this->entrada->consolidado_id;

        $request->validate(
            [
                'consolidado_numero' => [
                    'nullable',
                    Rule::unique('consolidados', 'numero')->where('abierto',0)->ignore($consolidado_id),
                ],
                'cliente' => ['required_if:consolidado_numero,null','exists:clientes,id'],
                'numero' => ['required'],
                'cliente_alias_numero' => ['sometimes','accepted'],
            ],
            [
                'consolidado_numero.unique' => __('Escribe un número de consolidado válido y abierto'),
                'cliente.required_without' => __('Selecciona un cliente'),
                'cliente.exists' => __('Selecciona un cliente válido.'),
                'numero.required' => __('Escribe el número de entrada'),
                'cliente_alias_numero.accepted' => __('Activa o desactiva la opción del alias del cliente en el número de entrada'),
            ]
        );
    }

    public function fill( array $validated )
    {
        $consolidado = $this->getConsolidado($validated); 
        $cliente = $this->getCliente($validated);
        
        $this->data = [
            'numero' => $validated['numero'],
            'consolidado_id' => is_object($consolidado) ? $consolidado->id : null,
            'cliente_id' => is_object($consolidado) ? $consolidado->cliente_id : $cliente,
            'cliente_alias_numero' => isset($validated['cliente_alias_numero']) ? 1 : 0,
            'updated_by_user' => Fakeuser::live(),
        ];
    }

    public function message( bool $saved )
    {
        if( ! $saved )
            return 'Error al actualizar entrada';

        return 'Entrada actualizada';
    }
    
    private function getCliente($validated)
    {
        if( ! isset($validated['cliente']) )
            return $this->entrada->cliente_id;

        return $validated['cliente'];
    }

    private function getConsolidado($validated)
    {
        if( ! isset($validated['consolidado_numero']) )
            return false;

        return Consolidado::where('numero', $validated['consolidado_numero'])->first();
    }
}
