<?php

namespace App\Ahex\Entrada\Domain;

trait FiltersByRequest
{
    /** Scopes Mains ********************************************************/

    private function getScopeFilters()
    {
        return [
            'ambito' => 'filterAmbit',
            'cliente' => 'filterClient',
            'codigor' => 'filterCodigor',
            'conductor' => 'filterConductor',
            'etapa' => 'filterStage',
            'fecha_hora' => 'filterDatetime',
            'orden' => 'filterOrder',
            'reempacador' => 'filterReempacador',
            'vehiculo' => 'filterVehiculo',
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




    /** Scopes Relationships ********************************************************/

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

    public function scopeFilterVehiculo($query, $vehiculo)
    {
        if( ! ctype_digit($vehiculo) )
            return $query;

        return $query->where('vehiculo_id', $vehiculo);
    }

    public function scopeFilterConductor($query, $conductor)
    {
        if( ! ctype_digit($conductor) )
            return $query;

        return $query->where('conductor_id', $conductor);
    }

    public function scopeFilterReempacador($query, $reempacador)
    {
        if( ! ctype_digit($reempacador) )
            return $query;

        return $query->where('reempacador_id', $reempacador);
    }

    public function scopeFilterCodigor($query, $codigor)
    {
        if( ! ctype_digit($codigor) )
            return $query;

        return $query->where('codigor_id', $codigor);
    }




    /** Scopes DateTimes ************************************************************/

    public function getFilterDatetime($key)
    {
        $filters = [
            'actualizado' => 'filterDatetimeUpdated',
            'confirmado'  => 'filterDatetimeConfirmed',
            'creado'      => 'filterDatetimeCreated',
            'importado'   => 'filterDatetimeImported',
            'reempacado'  => 'filterDatetimeRepackaged',
        ];

        if( isset($filters[$key]) )
            return $filters[$key];

        return false;
    }

    public function scopeFilterDatetime($query, $datetime)
    {
        if( $datetime_filter = $this->getFilterDatetime($datetime) )
        {
            $datetime_from = request('desde_fecha') . ' ' . request('desde_hora');
            $datetime_to = request('hasta_fecha') . ' ' . request('hasta_hora');
            return call_user_func_array([$this, $datetime_filter], [$datetime_from, $datetime_to]);
        }

        return $query;
    }

    public function scopeFilterDatetimeCreated($query, $datetime_from, $datetime_to)
    {
        return $query->whereBetween('created_at', [$datetime_from, $datetime_to]);
    }

    public function scopeFilterDatetimeUpdated($query, $datetime_from, $datetime_to)
    {
        return $query->whereBetween('updated_at', [$datetime_from, $datetime_to]);
    }

    public function scopeFilterDatetimeConfirmed($query, $datetime_from, $datetime_to)
    {
        return $query->whereBetween('confirmado_at', [$datetime_from, $datetime_to]);
    }

    public function scopeFilterDatetimeImported($query, $datetime_from, $datetime_to)
    {
        list($date_from, $time_from) = explode(' ', $datetime_from);
        list($date_to, $time_to) = explode(' ', $datetime_to);
        return $query->whereBetween('importado_fecha', [$date_from, $date_to])->whereBetween('importado_hora', [$time_from, $time_to]);
    }

    public function scopeFilterDatetimeRepackaged($query, $datetime_from, $datetime_to)
    {
        list($date_from, $time_from) = explode(' ', $datetime_from);
        list($date_to, $time_to) = explode(' ', $datetime_to);
        return $query->whereBetween('reempacado_fecha', [$date_from, $date_to])->whereBetween('reempacado_hora', [$time_from, $time_to]);
    }
}
