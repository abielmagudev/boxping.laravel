<?php

$settings = (object) array(
    'has_entradas' => isset($entradas) && $entradas instanceof \Illuminate\Database\Eloquent\Collection,
    'has_printing' => isset($printing) && is_bool($printing),
    'entradas' => $entradas ?? null,
);

?>

@if( $settings->has_entradas )

    @component('@.bootstrap.table')
        @slot('thead', ['Número','Destinatario'])
        @slot('tbody')
        @foreach($settings->entradas as $entrada)
        <tr>
            @if( $settings->has_printing )
            <td style="width:1%">
                <input type="checkbox" name="lista[]" value="{{ $entrada->id }}" id="checkbox-printing-list-{{ $entrada->id }}" class="form-check-input" form="form-printing-list">
            </td>
            @endif
            <td>{{ $entrada->numero }}</td>
            <td>
                @if( $entrada->destinatario )
                <span class="d-block">{{ $entrada->destinatario->direccion ?? '' }}</span>
                <small>{{ $entrada->destinatario->localidad }}</small>

                @else
                <small class="text-muted">Pendiente</small>

                @endif
            </td>
            <td class='text-end'>
                <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-sm btn-outline-primary">{!! $svg->eye !!}</a>
            </td>
        </tr>
        @endforeach
        @endslot
    @endcomponent

@endif
