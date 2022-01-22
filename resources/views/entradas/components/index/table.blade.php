<?php

$settings = [
    'checkboxes' => $checkboxes ?? false,
    'cliente' => $cliente ?? false,
    'consolidado' => $consolidado ?? false,
    'destinatario' => $destinatario ?? false,
];

$tableManager = new class ($entradas, $settings)
{
    public function __construct(object $entradas, array $settings)
    {
        $this->entradas = $entradas;

        $this->checkboxes = isset($settings['checkboxes']) && is_bool($settings['checkboxes']) 
                            ? $settings['checkboxes'] 
                            : false;
                            
        $this->cache = [
            'cliente' => isset($settings['cliente']) && is_a($settings['cliente'], \App\Cliente::class) ? $settings['cliente'] : false,
            'consolidado' => isset($settings['consolidado']) && is_a($settings['consolidado'], \App\Consolidado::class) ? $settings['consolidado'] : false,
            'destinatario' => isset($settings['destinatario']) && is_a($settings['destinatario'], \App\Destinatario::class) ? $settings['destinatario'] : false,
        ];
    }

    public function hasCheckboxes()
    {
        return $this->checkboxes;
    }

    public function hasEntradas()
    {
        return method_exists($this->entradas, 'total') 
                ? $this->entradas->total() > 0
                : $this->entradas->count() > 0;
    }

    public function hasCache(string $model)
    {
        return isset($this->cache[$model]) && is_object($this->cache[$model]);
    }

    public function entradas()
    {
        return method_exists($this->entradas, 'getCollection') 
                ? $this->entradas->getCollection() 
                : $this->entradas;
    }

    public function cache(string $model)
    {
        return $this->cache[$model];
    }
};

?>

@if( $tableManager->hasEntradas() ) 
    <?php $formHandle = include resource_path('views/entradas/components/index/_/EntradasFormManager.php') ?>

    @component('@.bootstrap.table')
        @slot('thead')
        <tr>
            @if( $tableManager->hasCheckboxes() )
            <th class="align-middle text-center ps-3" style="width:1%">
                @include('@.partials.checkboxes-switcher', [
                    'checkboxes_name' => $formHandle->checkboxName(),
                    'switcher' => $formHandle->switcher(),
                ])
            </th>

            @endif

            <th>Número <small class="d-block fw-normal">Consolidado</small></th>
            <th>Domicilio <small class="d-block fw-normal">Destinatario</small></th>
            <th>Cliente <small class="d-block fw-normal">Alias</small></th>
            <th></th>
        </tr>
        @endslot

        @foreach($tableManager->entradas() as $entrada)
        <tr>
            <?php // Checkboxes ?>
            @if( $tableManager->hasCheckboxes() )
            <td class="text-center" style="width:1%">
                <input 
                    type="checkbox" 
                    class="form-check-input" 
                    form="<?= $formHandle->id() ?>"
                    id="<?= $formHandle->checkboxId( $entrada->id ) ?>" 
                    name="<?= $formHandle->checkboxName() ?>" 
                    value="<?= $entrada->id ?>" 
                >
            </td>
            @endif

            <?php // Numero Entrada / Numero consolidado ?>
            <td>
                <label for="<?= $formHandle->checkboxId( $entrada->id ) ?>">{{ $entrada->numero }}</label>
                <small class="d-block">
                @if( $tableManager->hasCache('consolidado') || $entrada->hasConsolidado() )
                    <?php $route = route('consolidados.show', $tableManager->cache('consolidado')->id ?? $entrada->consolidado->id) ?>
                    <a href="<?= $route ?>">{{ $tableManager->cache('consolidado')->numero ?? $entrada->consolidado->numero }}</a>
                    
                @else
                    <span class="small" style="color:#BBBBBB">SIN CONSOLIDAR</span>
                    
                @endif
                </small>
            </td>

            <?php // Domicilio destinatario / Localidad destinatario ?>
            <td>
                @if( $tableManager->hasCache('destinatario') || $entrada->hasDestinatario() )
                <span class="d-block">{{ $tableManager->cache('destinatario')->direccion ?? $entrada->destinatario->direccion ?? '-' }}</span>
                <small>{{ $tableManager->cache('destinatario')->localidad ?? $entrada->destinatario->localidad }}</small>

                @endif
            </td>

            <?php // Alias cliente ?>
            <td>
                @if( $tableManager->hasCache('cliente') || $entrada->hasCliente() )
                <span class="d-block">{{ $tableManager->cache('cliente')->alias ?? $entrada->cliente->alias }}</span>
                
                @else
                <span class="text-muted">-</span>

                @endif
            </td>

            <?php // Opciones ?>
            <td class="text-end">
                <a href="<?= route('entradas.show', $entrada) ?>" class="btn btn-sm btn-outline-primary">
                    {!! $graffiti->design('eye')->svg() !!}
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent

    <?= $tableManager->hasCheckboxes() ? $formHandle->htmlForm() : '' ?>

@endif
