<?php

namespace App\Ahex\EntradaEtapa\Domain;

use App\Ahex\Fake\Domain\Fakeuser;

Trait FillingTrait
{
    private function fill(array $validated)
    {
        $filled = [
            'peso' => $validated['peso'] ?? null,
            'medida_peso' => $validated['medida_peso'] ?? null,
            'ancho' => $validated['ancho'] ?? null,
            'altura' => $validated['altura'] ?? null,
            'largo' => $validated['largo'] ?? null,
            'medida_volumen' => $validated['medida_volumen'] ?? null,
            'zona_id' => $validated['zona'] ?? null,
            'updated_by' => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $filled['created_by'] = Fakeuser::live();

        return $filled;
    }
}
