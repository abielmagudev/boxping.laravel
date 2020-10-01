<?php

namespace App\Ahex\Etapa\Domain;

use App\Etapa;
use App\Ahex\Fake\Domain\Fakeuser;
use App\Ahex\Etapa\Application\SlugNameTrait as SlugName;

Abstract class Storer
{
    use SlugName;

    public static function save($validated)
    {
        $filled = self::fill($validated);
        return Etapa::create($filled);
    }

    public static function fill($validated)
    {
        return [
            'nombre' => $validated['nombre'],
            'slug' => self::slugName( $validated['nombre'] ),
            'descripcion' => $validated['descripcion'],
            'realizar_medicion' => $validated['realizar_medicion'] ? 1 : 0,
            'peso_en' => isset($validated['peso_en']) ? $validated['peso_en'] : null,
            'volumen_en' => isset($validated['volumen_en']) ? $validated['volumen_en'] : null,
            'created_by' => Fakeuser::live(),
            'updated_by' => Fakeuser::live(),
        ];
    }
}
