<?php

$table_settings = (object) [
    'entradas'     => $entradas,
    'has_entradas' => is_a($entradas, \Illuminate\Database\Eloquent\Collection::class) && $entradas->count(),
    'checkbox'     => (object) [
        'form_id'  => 'formEntradasAction',
        'render'   => isset($checkbox) && is_bool($checkbox) ? $checkbox : true,
    ],
    'default' => (object) [
        'cliente'      => isset($cliente) && is_a($cliente, \App\Cliente::class) ? $cliente : false,
        'consolidado'  => isset($consolidado) && is_a($consolidado, \App\Consolidado::class) ? $consolidado : false,
        'destinatario' => isset($destinatario) && is_a($destinatario, \App\Destinatario::class) ? $destinatario : false,
    ],
    'thead' => [
        'checkbox'  => '',
        'entrada'   => 'Número <small class="d-block fw-normal">Consolidado</small>',
        'direccion' => 'Dirección <small class="d-block fw-normal">Localidad</small>',
        'cliente'   => 'Cliente <small class="d-block fw-normal">Alias</small>',
        'options'   => null,
    ],
];

/**
 * Elimina el elemento checkbox del thead
 * 
 * Si la propiedad render de checkbox es FALSE
 * ELIMINA el primer encabezado de la tabla 
 * ubicado en 'thead' => ['checkbox' => '', ...
 * 
 */
if(! $table_settings->checkbox->render )
    array_shift($table_settings->thead);

?>

@if( $table_settings->has_entradas ) 
    @component('@.bootstrap.table', [
        'thead' => $table_settings->thead,
    ])
        @foreach($entradas as $entrada)
        <tr>
            <!-- Checkbox -->
            @if( $table_settings->checkbox->render )
            <?php $checkbox_id = "checkbox-entrada-{$entrada->id}" ?>
            <td class="align-top" style="width:1%">
                <input 
                    type="checkbox" 
                    class="form-check-input" 
                    form="{{ $table_settings->checkbox->form_id }}"
                    id="{{ $checkbox_id }}" 
                    name="entradas[]" 
                    value="{{ $entrada->id }}" 
                >
            </td>
            @endif

            <!-- Entrada & Consolidado -->
            <td>
                <label for="{{ $checkbox_id ?? '' }}">{{ $entrada->numero }}</label>
                <small class="d-block">
                @if( $table_settings->default->consolidado || $entrada->hasConsolidado() )
                    <?php $route = route('consolidados.show', $table_settings->default->consolidado->id ?? $entrada->consolidado->id) ?>
                    <a href="{{ $route }}">{{ $table_settings->default->consolidado->numero ?? $entrada->consolidado->numero }}</a>
                    
                @else
                    <span class="small" style="color:#BBBBBB">SIN CONSOLIDAR</span>
                    
                @endif
                </small>
            </td>

            <!-- Destinatario & Localidad -->
            <td>
                @if( $table_settings->default->destinatario || $entrada->hasDestinatario() )
                <span class="d-block">{{ $table_settings->default->destinatario->direccion ?? $entrada->destinatario->direccion ?? '-' }}</span>
                <small>{{ $table_settings->default->destinatario->localidad ?? $entrada->destinatario->localidad }}</small>

                @endif
            </td>

            <!-- Alias cliente -->
            <td>
                @if( $table_settings->default->cliente || $entrada->hasCliente() )
                <span class="d-block">{{ $table_settings->default->cliente->alias ?? $entrada->cliente->alias }}</span>
                
                @else
                <span class="text-muted">-</span>

                @endif
            </td>

            <!-- Opciones -->
            <td class="text-end">
                <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-sm btn-outline-primary">
                    {!! $graffiti->design('eye')->cache('svg') !!}
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent

    @includeWhen($table_settings->checkbox->render, 'entradas.components.index.dynamics-actions')
@endif
