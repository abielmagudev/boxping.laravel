<?php

$settings = (object) array(
    'checkbox_form' => isset($checkbox_form) && is_string($checkbox_form) ? $checkbox_form : null,
    'checkbox_prefix' => $checkbox_prefix ?? '',
    'entradas' => $entradas ?? null,
    'has_checkbox_prefix' => isset($checkbox_prefix) && is_string($checkbox_prefix),
    'has_entradas' => isset($entradas) && $entradas instanceof \Illuminate\Database\Eloquent\Collection && $entradas->count(), // is_a($entradas, \Illuminate\Database\Eloquent\Collection::class);
    'except' => isset($except) && is_array($except) && count($except) ? $except : [],
    'has_numero_consolidado' => isset($numero_consolidado) && is_string($numero_consolidado),
    'numero_consolidado' => $numero_consolidado ?? null,
);

$all_theads = [
    'entrada' => 'Número <small class="d-block fw-normal">Consolidado</small>',
    'direccion' => 'Dirección <small class="d-block fw-normal">Localidad</small>',
    'cliente' =>'Alias <small class="d-block fw-normal">Cliente</small>',
];

// Elimina theads que estan en except de settings
$theads = array_filter($all_theads, function ($key) use ($settings) {
    return ! in_array($key, $settings->except);
}, ARRAY_FILTER_USE_KEY);

// Agrega item-vacio a thead para la columna de checkbox
if( $settings->has_checkbox_prefix )
    array_unshift($theads, '');

?>

@if( $settings->has_entradas )

    @component('@.bootstrap.table')
        @slot('thead', $theads)

        @slot('tbody')
        @foreach($settings->entradas as $entrada)
        <?php $checkbox_id = $settings->checkbox_prefix . $entrada->id ?>
        <tr>
            @if( $settings->has_checkbox_prefix )
            <td class="align-top" style="width:1%">
                <input type="checkbox" name="entradas[]" value="{{ $entrada->id }}" id="{{ $checkbox_id }}" class="form-check-input" form="{{ $settings->checkbox_form }}">
            </td>
            @endif

            <td class="align-top">
                <label for="{{ $checkbox_id }}">{{ $entrada->numero }}</label>

                @if(! $settings->has_numero_consolidado && !is_null($entrada->consolidado_id) )
                <small class="d-block">
                    <a href="#">{{ $entrada->consolidado->numero }}</a>
                </small>
                    
                @else
                <small class="d-block text-muted">{{ $settings->numero_consolidado ?? 'SIN CONSOLIDAR' }}</small>

                @endif
            </td>

            @if(! in_array('direccion', $settings->except) )
            <td class="align-top">
                @if( $entrada->destinatario )
                <span class="d-block">{{ $entrada->destinatario->direccion ?? '' }}</span>
                <small>{{ $entrada->destinatario->localidad }}</small>

                @else
                <small class="text-muted">Pendiente</small>

                @endif
            </td>
            @endif

            @if(! in_array('cliente', $settings->except) )
            <td class="align-top">{{ $entrada->cliente->alias }}</td>
            @endif

            @if(! in_array('options', $settings->except) )
            <td class='text-end'>
                <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-sm btn-outline-primary">{!! $svg->eye !!}</a>
            </td>
            @endif
        </tr>
        @endforeach
        @endslot
    @endcomponent

@else
<p class="text-center lead mt-3">Sin resultado de entradas</p>

@endif
