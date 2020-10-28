<?php

namespace App\Ahex\Etapa\Domain;

use App\Ahex\Zkeleton\Application\Slugger;
use App\Ahex\Fake\Domain\Fakeuser;

Trait FillingTrait
{
    private function fill(array $validated)
    {
        $filled = [
            'nombre' => $validated['nombre'],
            'slug' => Slugger::do( $validated['nombre'] ),
            'realiza_medicion' => $validated['realiza_medicion'] ? 1 : 0,
            'unica_medida_peso' => isset($validated['unica_medida_peso']) ? $validated['unica_medida_peso'] : null,
            'unica_medida_volumen' => isset($validated['unica_medida_volumen']) ? $validated['unica_medida_volumen'] : null,
            'updated_by' => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $filled['created_by'] = Fakeuser::live();

        return $filled;
    }
}
