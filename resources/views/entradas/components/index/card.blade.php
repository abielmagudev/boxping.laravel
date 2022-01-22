<?php

$settings = [
    'checkboxes' => $checkboxes ?? false,
    'options' => isset($options) ? boolval($options) : false,
    'pagination' => $pagination ?? false,
];

$cardManager = new class ($entradas, $settings)
{
    private $settings;

    private $entradas;

    public function __construct(object $entradas, array $settings)
    {
        $this->entradas = $entradas;

        $this->settings = $settings;
    }

    public function has(string $setting)
    {
        return isset($this->settings[$setting]) ? $this->settings[$setting] : false;
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
        'counter' => $cardManager->entradasCount(),
    ])

        @slot('options')
        @includeWhen($cardManager->has('options'), 'entradas.components.index.card-options')
        
        @endslot

        @include('entradas.components.index.table', [
            'entradas' => $cardManager->entradas(),
            'checkboxes' => $cardManager->has('checkboxes'),
            'cliente' => $cliente ?? false,
            'consolidado' => $consolidado ?? false,
            'destinatario' => $destinatario ?? false,
        ])

    @endcomponent
    </div>

    <div class="col-sm col-sm-3">
    @includeWhen(request()->filled('filter_token'), 'entradas.components.index.modal-filter-display')
    </div>
</div>
<br>

@includeWhen($cardManager->has('pagination'), '@.bootstrap.pagination-simple', ['collection' => $cardManager->entradas()])
