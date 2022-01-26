<?php

$settings = [
    'button_class' => $button_class ?? false,
    'button_content' => $button_content ?? false,
    'except_filters' => $except_filters ?? false,
    'modal_content' => $modal_content ?? false,
    'route' => $route ?? false,
    'icon' => $graffiti->design('funnel')->svg(),
];

$component = new class ($settings)
{
    const MODAL_ID = 'modalFiltrarEntradas';

    private $all_filters = [
        'numero',
        'ambitos',
        'clientes',
        'salidas',
        'etapas',
        'tiempos',
        'muestreos',
    ];

    private $settings;

    public function __construct(array $settings)
    {
        $this->button_contents = [
            'text' => 'Filtrar',
            'icon' => $settings['icon'] ?? '?', 
        ];

        $this->settings = [
            'button_class' => $this->setButtonClass( $settings['button_class'] ?? null ),
            'button_content' => $this->setButtonContent( $settings['button_content'] ?? null ),
            'except_filters' => isset( $settings['except_filters'] ) && is_array( $settings['except_filters'] ) ? $settings['except_filters'] : [],
            'modal_content' => isset( $settings['modal_content'] ) ? $settings['modal_content'] : null,
            'route' => $settings['route'] ?? url()->current(),
        ];
    }

    public function __get($name)
    {
        if(! isset($this->settings[$name]) )
            return;
            
        return $this->settings[$name];
    }

    public function setButtonClass($classes)
    {
        if(! is_string($classes) &&! is_array($classes) )
            return 'btn btn-sm btn-primary';

        return is_array($classes) ? implode(' ', $classes) : $classes;
    }

    public function setButtonContent(string $content = null)
    {
        if(! array_key_exists($content, $this->button_contents) )
            return $this->button_contents['icon'];

        return $this->button_contents[$content];
    }

    public function hasModalContent()
    {
        return $this->modal_content <> false;
    }

    public function getFilters()
    {
        if( count($this->except_filters) === 0 )
            return $this->all_filters;

        return array_diff($this->all_filters, $this->except_filters);
    }
};

?>

@include('@.bootstrap.modal-trigger', [
    'modal_id' => $component::MODAL_ID,
    'classes' => $component->button_class,
    'text' => $component->button_content,
])    

@push('modals')
    @component('@.bootstrap.modal', [
        'id' => $component::MODAL_ID,
        'title' => 'Filtrar entradas',
        'header_close' => true,
    ])
        <form action="<?= $component->route ?>" id="formFiltersEntradas" autocomplete="off">
            @foreach($component->getFilters() as $filter)
                @include("entradas.components.index.modal-filter.filters.{$filter}")
            @endforeach
            <hr>

            {!! $component->modal_content !!}

            <input type="hidden" name="filter_token" value="<?= csrf_token() ?>">
            <div class="text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" form="formFiltersEntradas">Filtrar entradas</button>
            </div>
        </form>
    @endcomponent
@endpush
