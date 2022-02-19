<?php

$displayHandler = new class( request() )
{
    public $titles = [
        'entrada' => [
            'numero' => ['Número', 'numero:comodin'],
            'ambito' => 'Ámbito',
        ],
        'relaciones' => [
            'cliente' => 'Cliente',
            'etapa' => 'Etapa',
            'salida' => 'Salida',
        ],
        'tiempos' => [
            'creado' => 'Creado',
            'actualizado' => 'Actualizado',
            'confirmado' => 'Confirmado',
            'importado' => 'Importado',
            'reempacado' => 'Reempacado',
        ],
    ];

    public $request;

    public function __construct(object $request)
    {
        $this->request = $request;
    }

    public function exists(string $query)
    {
        return $this->request->has($query);
    }

    public function has(string $query)
    {
        return $this->request->filled($query);
    }

    public function get(string $query, string $default = null)
    {
        return $this->request->input($query) ?? $default;
    }

    public function hasBeenFiltered()
    {
        return $this->has('filter_token');
    }

    public function allTitles()
    {
        return $this->titles;
    }

    public function title($content)
    {
        if(! is_array($content) )
            return $content;
        
        foreach($content as $item)
            if( $word = $this->titleWord($item) ) $words[] = $word;

        return implode(' ', $words);
    }

    public function titleWord(string $content_item)
    {
        if( strpos($content_item, ':') === false )
            return $content_item;

        list($filtered_require, $filtered_bind) = explode(':', $content_item);

        if( is_null($filtered_require) )
            return $this->get( $filtered_bind ); 

        if( $this->has($filtered_require)  )
            return $this->get( $filtered_bind );

        return false;
    }
}

?>

@if( $displayHandler->hasBeenFiltered() )
<div class="alert alert-info small" role="alert">
    <h5 class="alert-heading fw-bold">Filtrado de entradas</h5>
    @foreach($displayHandler->allTitles() as $group_name => $filtered)
    <div id="filtrado-<?= $group_name ?>">
        <p class="text-capitalize d-none">{{ $group_name }}</p>
        <ul class="list-unstyled mb-0">
        @foreach($filtered as $filter => $content)
            @if( $displayHandler->exists($filter) )              
            <li class="mb-2">
                <span class="small">{{ $displayHandler->title($content) }}</span>
                <span class="d-block text-capitalize fw-bold">{{ $displayHandler->get($filter, 'cualquier') }}</span>
            </li>
            @endif
        @endforeach
        </ul>
    </div>
    @endforeach
    <br>
    
    <p class="m-0">
        <span>Por página:</span>
        <b>{{ $displayHandler->get('mostrar', 'Completo') }}</b>
    </p>
</div>
@endif
