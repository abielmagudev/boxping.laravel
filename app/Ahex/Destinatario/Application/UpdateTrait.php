<?php 

namespace App\Ahex\Destinatario\Application;

use App\Destinatario;

use App\Ahex\Fake\Domain\Fakeuser;

Trait UpdateTrait
{
    private function updateDestinatario($request, $destinatario)
    {
        $prepared = $this->updatePrepare($request, $destinatario);
        return $destinatario->fill($prepared)->save();
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
            'updated_by_user' => Fakeuser::live(),
        );
    }
}
