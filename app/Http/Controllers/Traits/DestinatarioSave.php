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
            'entrada_id' => $validated->entrada,
            'nombre' => $validated->nombre,
            'direccion' => $validated->direccion,
            'codigo_postal' => $validated->codigo_postal,
            'ciudad' => $validated->ciudad,
            'estado' => $validated->estado,
            'pais' => $validated->pais,
            'referencias' => $request->filled('referencias') ? $request->get('referencias') : null,
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
            'referencias' => $request->filled('referencias') ? $request->input('referencias') : null,
            'telefono' => $validated->telefono,
            'verificado_at' => $request->has('verificado') ? $this->getVerificacionAt($request, $stored) : null,
            'verificado_by_user' => $request->has('verificado') ? $this->getVerificacionUser($request, $stored) : null,
            'updated_by_user' => $this->userlive(),
        );
    }

    private function getVerificacionAt($request, $stored)
    {
        if(! is_null($stored->verificado_at) )
            return $stored->verificado_at;
        
        return now();
    }

    private function getVerificacionUser($request, $stored)
    {
        if(! is_null($stored->verificado_by_user) )
            return $stored->verificado_by_user;
    
        return $this->userlive();
    }
}
