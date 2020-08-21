<?php 

namespace App\Http\Controllers\Traits;

use App\Consolidado;
use App\Entrada;

trait EntradaStore {
    
    private function storeEntrada(object $request)
    {
        $prepared = $this->storePrepare($request);
        return Entrada::create($prepared);
    }

    private function storePrepare($request)
    {
        if( $request->has('consolidado') )
        {
            $consolidado = Consolidado::find($request->get('consolidado'));
            return $this->storeWithConsolidado($request->validated(), $consolidado);
        }

        return $this->storeWithoutConsolidado($request->validated());
    }

    private function storeWithConsolidado($validated, $consolidado)
    {
        return array(
            'numero' => $validated['numero'],
            'consolidado_id' => $consolidado->id,
            'cliente_id' => $consolidado->cliente_id,
            'cliente_alias_numero' => isset($validated['cliente_alias_numero']) ? 1 : 0,
            'created_by_user' => $this->userlive(),
            'updated_by_user' => $this->userlive(),
        );
    }

    private function storeWithoutConsolidado($validated)
    {
        return array(
            'numero' => $validated['numero'],
            'cliente_id' => $validated['cliente'],
            'cliente_alias_numero' => isset($validated['cliente_alias_numero']) ? 1 : 0,
            'created_by_user' => $this->userlive(),
            'updated_by_user' => $this->userlive(),
        );
    }
}
