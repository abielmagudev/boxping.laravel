<?php 

namespace App\Ahex\Destinatario\Application;

use App\Destinatario;

use App\Ahex\Fake\Domain\Fakeuser;

Trait StoreTrait
{
    private function storeDestinatario($request)
    {
        $prepared = $this->storePrepare($request);
        return Destinatario::create($prepared);
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
            'created_by_user' => Fakeuser::live(),
            'updated_by_user' => Fakeuser::live(),
        );
    }
}
