<?php

namespace App\Ahex\EntradaEtapa\Domain;

use App\Ahex\Fake\Domain\Fakeuser;

Trait FillingTrait
{
    private function fill(array $validated)
    {
        $filled = [
            'peso' => $validated['peso'],
            'peso_en' => $validated['peso_en'],
            'ancho' => $validated['ancho'],
            'altura' => $validated['altura'],
            'largo' => $validated['largo'],
            'dimensiones_en' => $validated['dimensiones_en'],
            'updated_by' => Fakeuser::live(),
        ];

        if( requestMethod() === 'POST' )
            $filled['created_by'] = Fakeuser::live();

        return $filled;
    }
}
