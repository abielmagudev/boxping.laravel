<?php

$settings = [
    'routes' => [
        'create' => $routes['create'] ?? false,
    ],
    'except' => $except ?? false,
];

$component = new class ($settings)
{
    private $all_options = [
        'filters' => [],
        'printings' => [
            'informacion',
            'guias_impresion'
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
                'create' => isset($settings['routes']['create']) && is_string($settings['routes']['create']) 
                            ? $settings['routes']['create'] 
                            : route('entradas.create'),
            ],
            'except' => isset( $settings['except'] ) && is_array( $settings['except'] ) ? $settings['except'] : [],
        ];
    }

    public function hasRoute(string $name)
    {
        return isset($this->settings['routes'][$name]);
    }

    public function route(string $name)
    {
        return $this->settings['routes'][$name];
    }

    public function hasOption(string $name, string $suboption = null)
    {
        if(! isset($suboption) )
            return ! in_array($name, $this->settings['except']);

        return ! isset($this->settings['except'][$name]) ||! in_array($suboption, $this->settings['except'][$name]);
    }
};

?>

<div class="btn-group" role="group">
    @includeWhen($component->hasOption('filters'), 'entradas.components.index.modal-filter')

    @includeWhen($component->hasOption('printings'), 'entradas.components.index.card.dropdown-toprint')

    @includeWhen($component->hasOption('actions'), 'entradas.components.index.card.dropdown-actions')  
</div>
