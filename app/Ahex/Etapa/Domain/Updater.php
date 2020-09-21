<?php

namespace App\Ahex\Etapa\Domain;

use App\Ahex\Fake\Domain\Fakeuser;

Abstract class Updater
{
    public static function save($validated, $etapa)
    {
        $data = self::fill($validated);
        return $etapa->fill( $data )->save();
    }

    public static function fill($validated)
    {
        return [
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'realizar_medicion' => $validated['medicion']? 1 : 0,
            'updated_by_user' => Fakeuser::live(),
        ];
    }
}
