<?php

namespace App\Http\Controllers\Traits;

trait RemitenteSaveTrait {

    private function prepareToStore($validated)
    {
        $user_id = rand(1, 10);

        return array(
            'entrada_id' => $validated['entrada'],
            'nombre' => $validated['nombre'],
            'direccion' => $validated['direccion'],
            'codigo_postal' => $validated['codigo_postal'],
            'ciudad' => $validated['ciudad'],
            'estado' => $validated['estado'],
            'pais' => $validated['pais'],
            'telefono' => $validated['telefono'],
            'created_by_user' => $user_id,
            'updated_by_user' => $user_id,
        );
    }

    private function prepareToUpdate($validated)
    {
        return array(
            'nombre' => $validated['nombre'],
            'direccion' => $validated['direccion'],
            'codigo_postal' => $validated['codigo_postal'],
            'ciudad' => $validated['ciudad'],
            'estado' => $validated['estado'],
            'pais' => $validated['pais'],
            'telefono' => $validated['telefono'],
            'updated_by_user' => rand(1,10),
        );
    }
}
