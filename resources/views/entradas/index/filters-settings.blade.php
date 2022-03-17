<?php

$filters_settings = new class( request() )
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

    public function __construct(object $request)
    {
        $this->request = $request;
    }

    public function exists(string $filter)
    {
        return $this->request->has($filter);
    }

    public function has(string $filter)
    {
        return $this->request->filled($filter);
    }

    public function is(string $filter, $value)
    {
        return $this->request->get($filter) === $value;
    }

    public function get(string $filter, string $default = null)
    {
        return $this->request->input($filter) ?? $default;
    }




    public function title($texts)
    {
        if(! is_array($texts) )
            return (string) $texts;
        
        foreach($texts as $text)
            if( $word = $this->paraphrase($text) ) $words[] = $word;

        return implode(' ', $words);
    }

    public function paraphrase(string $text)
    {
        if( strpos($text, ':') === false )
            return $text;

        list($filter_required, $filter_bind) = explode(':', $text);

        return $this->has($filter_required) ? $this->get($filter_bind) : false;
    }
}

?>

<div class="alert alert-info small" role="alert">
    <h5 class="alert-heading fw-bold">Filtrado de entradas</h5>
    <p class="">
        <span>Por página:</span>
        <b>{{ $filters_settings->get('mostrar', 'Completo') }}</b>
    </p>
    <hr>
    
    @foreach($filters_settings->titles as $group => $filters)
    <div id="filtrado-<?= $group ?>">
        <p class="text-capitalize d-none">{{ $group }}</p>
        <ul class="list-unstyled mb-0">
        @foreach($filters as $filter => $texts)
            @if( $filters_settings->exists($filter) )              
            <li class="mb-2">
                <span class="small">{{ $filters_settings->title($texts) }}</span>
                <span class="d-block text-capitalize fw-bold">{{ $filters_settings->get($filter, 'cualquier') }}</span>
            </li>
            @endif
        @endforeach
        </ul>
    </div>
    @endforeach
</div>
