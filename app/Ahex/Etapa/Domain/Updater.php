<?php

namespace App\Ahex\Etapa\Domain;

use App\Ahex\Fake\Domain\Fakeuser;
use App\Ahex\Etapa\Application\SlugNameTrait as SlugName;

Abstract class Updater
{
    use SlugName;

    public static function save($validated, $etapa)
    {
        $data = self::fill($validated);
        return $etapa->fill( $data )->save();
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
            'updated_by' => Fakeuser::live(),
        ];
    }
}
