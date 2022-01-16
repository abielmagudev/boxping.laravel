<?php

namespace App\Ahex\Entrada\Domain;

use Illuminate\Http\Request;

trait FiltersByRequest
{
    protected $all_filters = [
        'ambito' => 'filterAmbit',
        'cliente' => 'filterClient',
        'codigor' => 'filterCodigor',
        'conductor' => 'filterConductor',
        'etapa' => 'filterStage',
        'numero' => 'filterNumber',
        'orden' => 'filterOrder',
        'reempacador' => 'filterReempacador',
        'salida' => 'filterSalida',
        'tiempo' => 'filterDatetime',
        'vehiculo' => 'filterVehiculo',
    ];

    protected $request_filters;


    /** Scopes Edges: Start & Over ********************************************************/

    public function scopeFilterByRequest($query, Request $request)
    {
        $filters = $request->except(['mostrar_completo','page']);

        foreach($filters as $filter => $value)
        {
            if( isset($this->all_filters[$filter]) )
            {
                $scope = $this->all_filters[$filter];
                $query = call_user_func([$query, $scope], $request);
            }
        }

        $this->request_filters = $request;
        return $query;
    }

    public function scopeGetFiltered($query, int $per_page = 25, string $orderBy = 'id')
    {
        $query->orderByDesc( $this->request_filters->get('ordenar', $orderBy) );

        if(! $this->request_filters->filled('mostrar_completo') )
            return $query->paginate( $this->request_filters->get('mostrar', $per_page) )->withQueryString();
                
        return $query->get();
    }


    /** Scopes Relationships ********************************************************/
    
    public function scopeFilterNumber($query, Request $request)
    {
        if(! $request->has(['comodin', 'numero']) ||! 
             in_array($request->comodin, ['inicial', 'final']) ||! 
             $request->filled('numero') )
            return $query;

        if( $request->comodin === 'inicial' )
            return $query->where('numero', 'like', "{$request->numero}%");
            
        return $query->where('numero', 'like', "%{$request->numero}");
    }

    public function scopeFilterAmbit($query, $request)
    {
        if(! in_array($request->ambito, ['consolidadas', 'sin-consolidar']) )
            return $query;
        
        return $request->ambito === 'consolidadas'
                                ? $query->whereNotNull('consolidado_id')
                                : $query->whereNull('consolidado_id');
    }

    public function scopeFilterClient($query, $request)
    {
        if(! isMinNumber($request->cliente, 1) )
            return $query;

        return $query->where('cliente_id', $request->cliente);
    }

    public function scopeFilterStage($query, $request)
    {
        if(! isMinNumber($request->etapa, 1) )
            return $query;

        return $query->whereHas('etapas', function ($subquery) use ($request) {
            return $subquery->where('etapa_id', $request->etapa);
        });

        // return $query->with(['etapas' => function ($subquery) use ($etapa_id) {
        //     $subquery->wherePivot('etapa_id', $etapa_id);
        // }]);
    }

    public function scopeFilterOrder($query, $request)
    {
        if(! in_array($request->orden, ['asc', 'desc']) )
            return $query->orderBy('id', 'desc');

        return $query->orderBy('id', $request->orden);
    }

    public function scopeFilterVehiculo($query, $request)
    {
        if(! isMinNumber($request->vehiculo, 1) )
            return $query;

        return $query->where('vehiculo_id', $request->vehiculo);
    }

    public function scopeFilterConductor($query, $request)
    {
        if(! isMinNumber($request->conductor, 1) )
            return $query;

        return $query->where('conductor_id', $request->conductor);
    }

    public function scopeFilterReempacador($query, $request)
    {
        if(! isMinNumber($request->reempacador, 1) )
            return $query;

        return $query->where('reempacador_id', $request->reempacador);
    }

    public function scopeFilterCodigor($query, $request)
    {
        if(! isMinNumber($request->codigor, 1) )
            return $query;

        return $query->where('codigor_id', $request->codigor);
    }

    public function scopeFilterSalida($query, $request)
    {
        if(! in_array($request->salida, ['con', 'sin']) )
            return $query;

        if( $request->salida === 'con' )
            return $query->whereIn('id', function($subquery) {
                $subquery->select('entrada_id')->from('salidas');
            });

        return $query->whereNotIn('id', function($subquery) {
            $subquery->select('entrada_id')->from('salidas');
        });  
    }


    /** Scopes DateTimes ************************************************************/

    public function scopeFilterDatetime($query, $request)
    {        
        $times = [
            'actualizado' => 'filterDatetimeUpdated',
            'confirmado'  => 'filterDatetimeConfirmed',
            'creado'      => 'filterDatetimeCreated',
            'importado'   => 'filterDatetimeImported',
            'reempacado'  => 'filterDatetimeRepackaged',
        ];

        if(! isset($times[$request->tiempo]) )
            return $query;

        $datetime_filter = $times[$request->tiempo];
        $datetime_from = implode(' ', $request->only(['desde_fecha', 'desde_hora']));
        $datetime_to   = implode(' ', $request->only(['hasta_fecha', 'hasta_hora']));

        return call_user_func_array([$query, $datetime_filter], [$datetime_from, $datetime_to]);
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
        return $query->whereBetween('importado_fecha', [$date_from, $date_to])
                     ->whereBetween('importado_hora', [$time_from, $time_to]);
    }

    public function scopeFilterDatetimeRepackaged($query, $datetime_from, $datetime_to)
    {
        list($date_from, $time_from) = explode(' ', $datetime_from);
        list($date_to, $time_to) = explode(' ', $datetime_to);
        return $query->whereBetween('reempacado_fecha', [$date_from, $date_to])
                     ->whereBetween('reempacado_hora', [$time_from, $time_to]);
    }
}
