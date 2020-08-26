<?php

namespace App\Http\Controllers\Traits;

use App\Remitente;

trait RemitenteSave {

    private function storeRemitente($request)
    {
        $prepared = $this->storePrepare($request); 
        return Remitente::create($prepared);
    }

    private function updateRemitente($request, $remitente)
    {
        $prepared = $this->updatePrepare($request, $remitente);
        return $remitente->fill($prepared)->save();
    }

    private function storePrepare($request)
    {
        $validated = (object) $request->validated();

        return [
            'nombre' => $validated->nombre,
            'direccion' => $validated->direccion,
            'codigo_postal' => $validated->codigo_postal,
            'ciudad' => $validated->ciudad,
            'estado' => $validated->estado,
            'pais' => $validated->pais,
            'telefono' => $validated->telefono,
            'created_by_user' => $this->userlive(),
            'updated_by_user' => $this->userlive(),
        ];
    }

    private function updatePrepare($request, $stored)
    {
        $validated = (object) $request->validated();

        return [
            'nombre' => $validated->nombre,
            'direccion' => $validated->direccion,
            'codigo_postal' => $validated->codigo_postal,
            'ciudad' => $validated->ciudad,
            'estado' => $validated->estado,
            'pais' => $validated->pais,
            'telefono' => $validated->telefono,
            'updated_by_user' => $this->userlive(),
        ];
    }
}
