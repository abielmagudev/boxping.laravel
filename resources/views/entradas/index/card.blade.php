<?php

$settings = [
    'title' => isset($title) && is_string($title) ? $title : null,
    'cache' => isset($cache) && is_array($cache) ? collect($cache) : collect([]),
    'except' => isset($except) && is_array($except) ? collect($except) : collect([]),
];

$component = new class($entradas, $settings)
{
    private $form = [
        'id' => 'entradasForm',
        'checkboxes' => [
            'name' => 'entradas[]',
            'prefix' => 'checkboxEntrada',
            'switcher' => 'checkbox',
        ],
    ];

    public function __construct(object $entradas, array $settings)
    {
        $this->entradas = $entradas;
        $this->title = $settings['title'];
        $this->cache = $settings['cache'];
        $this->except = $settings['except'];
    }

    public function title()
    {
        return $this->title ?? 'Entradas';
    }

    public function countEntradas()
    {
        if( method_exists($this->entradas, 'total') )
            return $this->entradas->total();

        return $this->entradas->count();
    }

    public function hasEntradas()
    {
        return method_exists($this->entradas, 'isNotEmpty') 
                ? $this->entradas->isNotEmpty() 
                : ($this->entradas->count() > 0);
    }

    public function hasFilteredEntradas()
    {
        return request()->filled('filtered_token');
    }

    public function entradas($raw = false)
    {
        if(! $raw && method_exists($this->entradas, 'getCollection') ) 
            return $this->entradas->getCollection();
            
        return $this->entradas;
    }

    public function hasCache(string $key)
    {
        return $this->cache->has($key) &&! is_null($this->cache->get($key));
    }

    public function cache(string $key)
    {
        return $this->cache->get($key, null);
    }

    public function except(string $key, $default = null)
    {
        return $this->except->get($key, $default);
    }

    public function allow(string $section, string $element = null)
    {        
        if(! is_null($element) && $this->except->has($section) )
            return ! in_array($element, $this->except->get($section));
        
        return ! $this->except->contains($section);
    }

    public function form(string $key, string $inner = null)
    {
        if( isset($this->form[$key]) &&! is_array($this->form[$key]) )
            return $this->form[$key];

        if( array_key_exists($inner, $this->form[$key]) )
            return $this->form[$key][$inner];

        return;
    }
};

?>

<a id="lista-entradas"></a>

<div class="row">
    <div class="col-sm">
    @component('@.bootstrap.card', [
        'title' => $component->title(),
        'counter' => $component->countEntradas(),
    ])
        @slot('options')
            @includeWhen($component->allow('options'), 'entradas.index.card.options')
        @endslot

        @includeWhen($component->hasEntradas(), 'entradas.index.card.table', [
            'entradas' => $component->entradas(),
        ])
    @endcomponent
    </div>

    @if( $component->hasFilteredEntradas() )   
    <div class="col-sm col-sm-3">
        @include('entradas.index.filters-settings')
    </div>
    @endif
</div>
<br>

@include('@.bootstrap.pagination-simple', [
    'collection' => $component->entradas(true)
])

@includeWhen( ($component->hasEntradas() && $component->allow('checkboxes')) , 
    'entradas.index.card.form'
)