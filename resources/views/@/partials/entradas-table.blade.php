<?php

use Illuminate\Database\Eloquent\Collection;

$settings = (object) array(
    'has_checkboxes_form' => isset($checkboxes_form) && is_string($checkboxes_form),
    'has_entradas' => isset($entradas) && is_a($entradas, Collection::class) && $entradas->count(),
    'has_numero_consolidado' => isset($numero_consolidado) && is_string($numero_consolidado),
    'checkboxes_form' => $checkboxes_form ?? null,
    'entradas' => $entradas ?? null,
    'except' => isset($except) && is_array($except) && count($except) ? $except : [],
    'numero_consolidado' => $numero_consolidado ?? null,
    'all_theads' => [
        'checkbox' => '',
        'entrada' => 'Número <small class="d-block fw-normal">Consolidado</small>',
        'direccion' => 'Dirección <small class="d-block fw-normal">Localidad</small>',
        'cliente' =>'Alias <small class="d-block fw-normal">Cliente</small>',
        'options' => '',
    ],
);

// Al no estar definido checkboxes_form, se elimina thead de checkbox
if( ! $settings->has_checkboxes_form )
    array_shift($settings->all_theads);

// Obtiene theads del calculo de all_theads contra except(array_flip: para convertir values en keys)
$except_keys = array_flip($settings->except);
$theads = array_diff_key($settings->all_theads, $except_keys);

?>

@if( $settings->has_entradas )

    @component('@.bootstrap.table')
        @slot('thead', $theads)

        @foreach($settings->entradas as $entrada)
        <?php $checkbox_id = "checkboxEntrada{$entrada->id}" ?>
        <tr>
            @if( $settings->has_checkboxes_form )
            <td class="align-top" style="width:2.5%">
                <input type="checkbox" class="form-check-input" name="entradas[]" value="{{ $entrada->id }}" id="{{ $checkbox_id }}" form="{{ $settings->checkboxes_form }}">
            </td>
            @endif

            <td class="align-top">
                <label for="{{ $checkbox_id }}">{{ $entrada->numero }}</label>

                @if( $settings->has_numero_consolidado )
                <p class="text-muted small m-0">{{ $settings->numero_consolidado }}</p>
                    
                @elseif( $entrada->issetConsolidado() )
                <p class="small m-0">
                    <a href="#">{{ $entrada->consolidado->numero }}</a>
                </p>

                @else
                <p class="text-muted small m-0">Sin consolidar</p>

                @endif
            </td>

            @if( ! in_array('direccion', $settings->except) )
            <td class="align-top">
                @if( $entrada->destinatario )
                <span class="d-block">{{ $entrada->destinatario->direccion ?? '' }}</span>
                <small>{{ $entrada->destinatario->localidad }}</small>

                @else
                <small class="text-muted">Pendiente</small>

                @endif
            </td>
            @endif

            @if( ! in_array('cliente', $settings->except) )
            <td class="">{{ $entrada->cliente->alias }}</td>
            @endif

            @if( ! in_array('options', $settings->except) )
            <td class='text-end'>
                <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-sm btn-outline-primary">s</a>
            </td>
            @endif
        </tr>
        @endforeach
    @endcomponent

@else
<p class="text-center lead mt-3">Sin resultado de entradas</p>

@endif
