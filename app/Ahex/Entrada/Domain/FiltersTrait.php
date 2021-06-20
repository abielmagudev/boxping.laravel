<?php

namespace App\Ahex\Entrada\Domain;

trait FiltersTrait
{
    use FiltersDatetimeTrait;

    private function getScopeFilters()
    {
        return [
            'ambito' => 'filterAmbit',
            'cliente' => 'filterClient',
            'etapa' => 'filterStage',
            'fecha_hora' => 'filterDatetime',
            'orden' => 'filterOrder',
        ];
    }

    public function scopeFilterByRequest($query, $request)
    {
        foreach($this->getScopeFilters() as $filter => $action)
        {
            if( isset($request[$filter]) )
                $query = call_user_func([$query, $action], $request[$filter]);
        }

        return $query;
    }

    public function scopeGetFiltered($query, $sampling)
    {
        if( is_int($sampling) || is_numeric($sampling) )
            return $query->orderByDesc('id')->paginate($sampling);
        
        return $query->orderByDesc('id')->get();
    }

    public function scopeFilterAmbit($query, $ambit)
    {
        if( ! in_array($ambit, ['consolidadas', 'sin-consolidar']) )
            return $query;

        if( $ambit == 'consolidadas' )
            return $query->whereNotNull('consolidado_id');

        return $query->whereNull('consolidado_id');
    }

    public function scopeFilterClient($query, $cliente)
    {
        if( ! ctype_digit($cliente) )
            return $query;

        return $query->where('cliente_id', $cliente);
    }

    public function scopeFilterStage($query, $etapa)
    {
        if( ! ctype_digit($etapa) )
            return $query;

        return $query->whereHas('etapas', function ($subquery) use ($etapa) {
            return $subquery->where('etapa_id', $etapa);
        });

        // return $query->with(['etapas' => function ($subquery) use ($etapa_id) {
        //     $subquery->wherePivot('etapa_id', $etapa_id);
        // }]);
    }

    public function scopeFilterOrder($query, $orden)
    {
        if( ! in_array($orden, ['asc', 'desc']) )
            return $query->orderBy('id', 'desc');

        return $query->orderBy('id', $orden);
    }
}
