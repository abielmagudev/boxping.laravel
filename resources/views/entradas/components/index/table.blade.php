<?php

if(! isset($efc) )
    $efc = include resource_path('views/entradas/components/index/form_config.php');

$settings = [
    'checkboxes' => $checkboxes ?? true,
    'cliente' => $cliente ?? false,
    'consolidado' => $consolidado ?? false,
    'destinatario' => $destinatario ?? false,
];

$component = new class ($entradas, $settings)
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

@if( $component->hasEntradas() ) 

    @component('@.bootstrap.table')
        @slot('thead')
        <tr>
            @if( $component->hasCheckboxes() )
            <th class="align-middle text-center ps-3" style="width:1%">
                @include('@.partials.checkboxes-switcher', [
                    'checkboxes_name' => $efc->checkbox->name,
                    'switcher' => $efc->checkbox->type,
                ])
            </th>

            @endif

            <th>Entrada<small class="d-block fw-normal">Consolidado</small></th>
            <th>Destinatario <small class="d-block fw-normal">Domicilio</small></th>
            <th>Cliente <small class="d-block fw-normal">Alias</small></th>
            <th></th>
        </tr>
        @endslot

        @foreach($component->entradas() as $entrada)
        <?php $checkbox_id = $efc->checkbox->prefix . $entrada->id ?>
        <tr>
            <?php // Checkboxes ?>
            @if( $component->hasCheckboxes() )
            <td class="text-center" style="width:1%">
                <input 
                    type="checkbox" 
                    class="form-check-input" 
                    id="<?= $checkbox_id ?>" 
                    form="<?= $efc->id ?>"
                    name="<?= $efc->checkbox->name ?>" 
                    value="<?= $entrada->id ?>" 
                >
            </td>
            @endif

            <?php // Numero Entrada / Numero consolidado ?>
            <td>
                <label for="<?= $checkbox_id ?>">{{ $entrada->numero }}</label>
                <small class="d-block">
                @if( $component->hasCache('consolidado') || $entrada->hasConsolidado() )
                    <?php $route = route('consolidados.show', $component->cache('consolidado')->id ?? $entrada->consolidado->id) ?>
                    <a href="<?= $route ?>">{{ $component->cache('consolidado')->numero ?? $entrada->consolidado->numero }}</a>
                    
                @else
                    <span class="small" style="color:#BBBBBB">SIN CONSOLIDAR</span>
                    
                @endif
                </small>
            </td>

            <?php // Domicilio destinatario / Localidad destinatario ?>
            <td>
                @if( $component->hasCache('destinatario') || $entrada->hasDestinatario() )
                <span class="d-block">{{ $component->cache('destinatario')->direccion ?? $entrada->destinatario->direccion ?? '-' }}</span>
                <small>{{ $component->cache('destinatario')->localidad ?? $entrada->destinatario->localidad }}</small>

                @endif
            </td>

            <?php // Alias cliente ?>
            <td>
                @if( $component->hasCache('cliente') || $entrada->hasCliente() )
                <span class="d-block">{{ $component->cache('cliente')->alias ?? $entrada->cliente->alias }}</span>
                
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

    @includeWhen($component->hasCheckboxes(), 'entradas.components.index.form')
@endif
