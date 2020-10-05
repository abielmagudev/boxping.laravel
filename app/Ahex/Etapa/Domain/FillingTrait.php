<?php

namespace App\Ahex\Etapa\Domain;

use App\Etapa;
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
            'medida_peso' => isset($validated['medida_peso']) ? $validated['medida_peso'] : null,
            'medida_volumen' => isset($validated['medida_volumen']) ? $validated['medida_volumen'] : null,
            'updated_by' => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $filled['created_by'] = Fakeuser::live();

        return $filled;
    }
}
