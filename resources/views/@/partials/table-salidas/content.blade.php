<?php

$settings = (object) [
    'salidas' => $salidas,
    'has_salidas' => is_a($salidas, \Illuminate\Database\Eloquent\Collection::class) && $salidas->count(),
    'thead' => [
        'entrada' => 'Entrada',
        'rastreo' => 'Rastreo',
        'confirmacion' => 'Confirmación',
    ],
    'checkbox' => (object) [
        'form_id' => $form_id ?? null,
        'render' => isset($form_id) && is_string($form_id),
    ],
    'options' => (object) [
        'render' => isset($options) && is_bool($options) ? $options : true,
        'show' => isset($show) && is_bool($show) ? $show : true,
        'edit' => isset($edit) && is_bool($edit) ? $edit : true,
    ],
];

?>
@if( $settings->has_salidas )   
    @component('@.bootstrap.table', [
        'thead' => $settings->thead,
    ])
        @foreach($salidas as $salida)
        <tr>
            <td class="text-nowrap">
                <span class='d-block'>
                    <a href="{{ route('entradas.show', $salida->entrada) }}" class="link-primary text-decoration-none">{{ $salida->entrada->numero }}</a>
                </span>

                @if( $salida->entrada->hasConsolidado() )
                <small>
                    <a href="{{ route('consolidados.show', $salida->entrada->consolidado) }}" class="link-primary text-decoration-none">{{ $salida->entrada->consolidado->numero }}</a>
                </small>

                @else
                <small style="color:#BBB">SIN CONSOLIDAR</small>

                @endif
            </td>
            <td>{{ $salida->rastreo }}</td>
            <td>{{ $salida->confirmacion }}</td>
            <td class="text-end">
            @if( $settings->options->render ) 
                @if( $settings->options->show )                 
                <a href="{{ route('salidas.show', $salida) }}" class="btn btn-sm btn-outline-primary">
                    @include('@.bootstrap.icon', ['icon' => 'eye'])
                </a>
                @endif
                @if( $settings->options->edit )     
                <a href="{{ route('salidas.edit', $salida) }}" class="btn btn-sm btn-outline-warning">
                    @include('@.bootstrap.icon', ['icon' => 'pencil-fill'])
                </a>
                @endif
            @endif
            </td>
        </tr>
        @endforeach
    @endcomponent
@endif
