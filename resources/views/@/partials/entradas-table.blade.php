<?php

use Illuminate\Database\Eloquent\Collection;
// is_a($entradas, Collection::class);
// $entradas instanceof Collection;

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
if(! $settings->has_checkboxes_form )
    array_shift($settings->all_theads);

// Obtiene theads del calculo de all_theads contra except(Flip: para convertir values en keys)
$theads = array_diff_key($settings->all_theads, array_flip($settings->except));

// Valida la impresion de la columna de la tabla
function allowColumn($column, $except)
{
    return (bool) ! in_array($column, $except);
}

?>

@if( $settings->has_entradas )

    @component('@.bootstrap.table')
        @slot('thead', $theads)

        @slot('tbody')
        @foreach($settings->entradas as $entrada)
        <?php $checkbox_id = "checkbox-entrada-{$entrada->id}" ?>
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
                    
                @elseif( $entrada->hasConsolidado() )
                <p class="small m-0">
                    <a href="#">{{ $entrada->consolidado->numero }}</a>
                </p>

                @else
                <p class="text-muted small m-0">Sin consolidar</p>

                @endif
            </td>

            @if( allowColumn('direccion', $settings->except) )
            <td class="align-top">
                @if( $entrada->destinatario )
                <span class="d-block">{{ $entrada->destinatario->direccion ?? '' }}</span>
                <small>{{ $entrada->destinatario->localidad }}</small>

                @else
                <small class="text-muted">Pendiente</small>

                @endif
            </td>
            @endif

            @if( allowColumn('cliente', $settings->except) )
            <td class="">{{ $entrada->cliente->alias }}</td>
            @endif

            @if( allowColumn('options', $settings->except) )
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
