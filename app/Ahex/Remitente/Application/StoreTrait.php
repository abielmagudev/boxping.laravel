<?php 

namespace App\Ahex\Remitente\Application;

use App\Remitente;

use App\Ahex\Fake\Domain\Fakeuser;

Trait StoreTrait
{
    private function storeRemitente($request)
    {
        $prepared = $this->storePrepare($request); 
        return Remitente::create($prepared);
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
            'created_by_user' => Fakeuser::live(),
            'updated_by_user' => Fakeuser::live(),
        ];
    }
}
