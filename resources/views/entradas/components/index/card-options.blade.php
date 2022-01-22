<?php

$settings = [
    'route_create' => $route_create ?? false,
    'except' => $except ?? false,
];

$optionsManager = new class ($settings)
{
    private $all_options = [
        'filter',
        'toprint' => [
            'informacion',
            'guias_impresion' => true
        ],
        'actions' => [
            'create',
            'update',
            'destroy',
        ],
    ];

    private $settings;

    public function __construct(array $settings)
    {
        $this->settings = [
            'routes' => [
                'create' => isset( $settings['route_create'] ) && is_string( $settings['route_create'] ) ? $settings['route_create'] : route('entradas.create'),
            ],
            'except' => isset( $settings['except'] ) && is_array( $settings['except'] ) ? $settings['except'] : [],
        ];
    }

    public function __get($name)
    {
        if(! isset($this->settings[$name]) )
            return;

        return $this->settings[$name];
    }
};

?>

<div class="btn-group" role="group">

    @include('entradas.components.index.modal-filter', [
        'button_class' => 'btn btn-sm btn-outline-primary'    
    ])

    <div class="btn-group btn-group-sm" role="group" id="wrapperDropdownImprimirMultiple">
        <button id="buttonDropdownImprimirMultiple" type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <span>{!! $graffiti->design('printer')->svg() !!}</span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownImprimirMultiple">
            <li>
                <a class="dropdown-item" href="<?= route('entradas.imprimir.multiple') ?>">Información</a>
            </li>

            @if( $guias_impresion->count() )
            <li>
                <hr class="dropdown-divider">
                <h6 class="dropdown-header">Guías de impresión</h6>
            </li>

            @foreach($guias_impresion as $guia)
            <li>
                <a class="dropdown-item" href="<?= route('entradas.imprimir.multiple', $guia) ?>">{{ $guia->nombre }}</a>
            </li>
            @endforeach

            @endif
        </ul>
    </div>

    <div class="btn-group btn-group-sm" role="group" id="wrapperDropdownActions">
        <button id="buttonDropdownActions" type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <span>{!! $graffiti->design('list')->svg() !!}</span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="buttonDropdownActions">
            <li>
                <a class="dropdown-item" href="<?= $optionsManager->create_route ?>">
                    <span>{!! $graffiti->design('plus-lg')->svg() !!}</span>
                    <span class="align-middle ms-1">Nueva</span>
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#update">
                    <span>{!! $graffiti->design('arrow-clockwise')->svg() !!}</span>
                    <span class="align-middle ms-1">Actualizar</span>
                </a>
            </li>
            <li>
                @include('entradas.components.index.modal-delete')
            </li>
        </ul>
    </div>
</div>
