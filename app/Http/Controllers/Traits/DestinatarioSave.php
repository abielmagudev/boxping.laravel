<?php 

namespace App\Http\Controllers\Traits;

use App\Destinatario;

trait DestinatarioSave {

    private function storeDestinatario($request)
    {
        $prepared = $this->storePrepare($request);
        return Destinatario::create($prepared);
    }

    private function updateDestinatario($request, $destinatario)
    {
        $prepared = $this->updatePrepare($request, $destinatario);
        return $destinatario->fill($prepared)->save();
    }

    private function storePrepare($request)
    {
        $validated = (object) $request->validated();

        return array(
            'nombre' => $validated->nombre,
            'direccion' => $validated->direccion,
            'codigo_postal' => $validated->codigo_postal,
            'ciudad' => $validated->ciudad,
            'estado' => $validated->estado,
            'pais' => $validated->pais,
            'referencias' => $request->filled('referencias') ? $validated->referencias : null,
            'telefono' => $validated->telefono,
            'created_by_user' => $this->userlive(),
            'updated_by_user' => $this->userlive(),
        );
    }

    private function updatePrepare($request, $stored)
    {        
        $validated = (object) $request->validated();

        return array(
            'nombre' => $validated->nombre,
            'direccion' => $validated->direccion,
            'codigo_postal' => $validated->codigo_postal,
            'ciudad' => $validated->ciudad,
            'estado' => $validated->estado,
            'pais' => $validated->pais,
            'referencias' => $request->filled('referencias') ? $validated->referencias : null,
            'telefono' => $validated->telefono,
            'updated_by_user' => $this->userlive(),
        );
    }
}
