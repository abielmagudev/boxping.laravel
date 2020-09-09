<?php 

namespace App\Ahex\Remitente\Application;

use App\Remitente;

use App\Ahex\Fake\Domain\Fakeuser;

Trait UpdateTrait
{
    private function updateRemitente($request, $remitente)
    {
        $prepared = $this->updatePrepare($request, $remitente);
        return $remitente->fill($prepared)->save();
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
            'updated_by_user' => Fakeuser::live(),
        ];
    }
}
