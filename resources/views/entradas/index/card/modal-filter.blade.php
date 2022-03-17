<?php

$modal = new class($component)
{
    public $id = 'modalEntradasFilter';

    private $form = [
        'id' => 'formEntradasFilter',
        'filters' => [
            'numero',
            'ambitos',
            'clientes',
            'salidas',
            'etapas',
            'tiempos',
            'muestreos',
        ]
    ];

    public function __construct(object $component)
    {
        $this->form['except'] = $component->except('filters', []);
    }

    public function form(string $key)
    {
        return ! array_key_exists($key, $this->form) ?: $this->form[$key];
    }

    public function allowFilter(string $filter)
    {
        return ! in_array($filter, $this->form('except'));
    }
};

?>

@component('@.bootstrap.modal-trigger', [
    'classes' => 'btn btn-sm btn-outline-primary',
    'modal_id' => $modal->id,
])    
    {!! $graffiti->design('funnel')->svg() !!}
@endcomponent

@push('modals')
    @component('@.bootstrap.modal', [
        'id' => $modal->id,
        'header' => [
            'title' => 'Filtrar entradas',
        ],
        'footer' => [
            'classes' => 'bg-light',
            'button_close' => [
                'classes' => 'btn btn-outline-secondary',
                'text' => 'Cancelar'
            ],
        ],
    ])
        @slot('body_content')
        <form action="<?= url()->current() ?>" id="<?= $modal->form('id') ?>" autocomplete="off">
            @foreach($modal->form('filters') as $filter)
                @includeWhen($modal->allowFilter($filter), "entradas.index.card.modal-filter-filters.{$filter}")
            @endforeach
            <input type="hidden" name="filtered_token" value="<?= csrf_token() ?>">
        </form>
        @endslot
        
        @slot('footer_content')
        <button type="submit" class="btn btn-primary" form="<?= $modal->form('id') ?>">Filtrar entradas</button>
        @endslot
    @endcomponent
@endpush
