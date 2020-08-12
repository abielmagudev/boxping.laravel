<?php namespace App\Http\Controllers\Traits;

trait DestinatarioSaveTrait {

    private function prepareToStore($validated)
    {
        $user_id = rand(1,10);

        return array(
            'entrada_id' => $validated['entrada'],
            'nombre' => $validated['nombre'],
            'direccion' => $validated['direccion'],
            'codigo_postal' => $validated['codigo_postal'],
            'ciudad' => $validated['ciudad'],
            'estado' => $validated['estado'],
            'pais' => $validated['pais'],
            'referencias' => $validated['referencias'] ?? null,
            'telefono' => $validated['telefono'],
            'created_by_user' => $user_id,
            'updated_by_user' => $user_id,
        );
    }

    private function prepareToUpdate($validated, $stored)
    {        
        return array(
            'nombre' => $validated['nombre'],
            'direccion' => $validated['direccion'],
            'codigo_postal' => $validated['codigo_postal'],
            'ciudad' => $validated['ciudad'],
            'estado' => $validated['estado'],
            'pais' => $validated['pais'],
            'referencias' => $validated['referencias'] ?? null,
            'telefono' => $validated['telefono'],
            'verificado_at' => isset($validated['verificado']) ? $this->verificadoAt($stored->verificado_at) : null,
            'verificado_by_user' => isset($validated['verificado']) ? $this->verificadoUser($stored->verificado_by_user) : null,
            'updated_by_user' => rand(1,10),
        );
    }

    private function verificadoAt($verificado_at)
    {
        if( is_null($verificado_at) )
            return now();
        
        return $verificado_at;
    }

    private function verificadoUser($verificado_by_user)
    {
        if( is_null($verificado_by_user) )
            return rand(1,10);
        
        return $verificado_by_user;
    }
}
