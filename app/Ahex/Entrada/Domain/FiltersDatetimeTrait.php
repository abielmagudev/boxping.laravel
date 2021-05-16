<?php

namespace App\Ahex\Entrada\Domain;

trait FiltersDatetimeTrait 
{
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
