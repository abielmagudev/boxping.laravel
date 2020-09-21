<?php

namespace App\Ahex\Etapa\Domain;

use App\Etapa;
use App\Ahex\Fake\Domain\Fakeuser;

Abstract class Storer
{
    public static function save($validated)
    {
        $filled = self::fill($validated);
        return Etapa::create($filled);
    }

    public static function fill($validated)
    {
        return [
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'realizar_medicion' => $validated['medicion'] ? 1 : 0,
            'created_by_user' => Fakeuser::live(),
            'updated_by_user' => Fakeuser::live(),
        ];
    }
}
