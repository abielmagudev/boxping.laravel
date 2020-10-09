<?php 

namespace App\Ahex\EntradaEtapa\Application;

use App\Etapa;

Trait FormCreateTrait
{
    private function etapaSelected($request)
    {
        $request->validate([
            'slug' => 'exists:etapas,slug'
        ], [
            'slug.exists' => __('Selecciona una etapa válida'),
        ]);

        return Etapa::where('slug', $request->slug)->first();
    }

    private function etapasNotHaveEntrada($etapas)
    {
        $etapas_id = $etapas->pluck('id');
        return Etapa::whereNotIn('id', $etapas_id)->get();
    }
}
