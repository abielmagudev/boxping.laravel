<?php

$settings = [
    'filtered' => request()->filled('filter_token'),
    'options' => isset($options) ? boolval($options) : false,
    'pagination' => $pagination ?? false,
];

$component = new class ($entradas, $settings)
{
    private $entradas;

    private $settings;

    public function __construct(object $entradas, array $settings)
    {
        $this->entradas = $entradas;

        $this->settings = $settings;
    }

    public function has(string $setting)
    {
        return $this->settings[$setting] ?? false;
    }

    public function entradas()
    {
        return $this->entradas;
    }

    public function entradasCount()
    {
        return method_exists($this->entradas, 'total') 
                ? $this->entradas->total() 
                : $this->entradas->count();
    }
};

?>

<a id="lista-entradas"></a>

<div class="row">
    <div class="col-sm">
    @component('@.bootstrap.card', [
        'title' => 'Entradas',
        'counter' => $component->entradasCount(),
    ])

        @slot('options')
        @includeWhen($component->has('options'), 'entradas.components.index.card.options')
        
        @endslot

        @include('entradas.components.index.table', [
            'entradas' => $component->entradas(),
        ])

    @endcomponent
    </div>

    @if( $component->has('filtered') )   
    <div class="col-sm col-sm-3">
    @include('entradas.components.index.modal-filter.display')

    </div>
    @endif
</div>
<br>

@includeWhen($component->has('pagination'), '@.bootstrap.pagination-simple', ['collection' => $component->entradas()])
