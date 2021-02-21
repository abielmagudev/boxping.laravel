<?php

$summary = (object) array(
    'entradas' => isset($entradas) && $entradas instanceof \Illuminate\Database\Eloquent\Collection ? $entradas : false,
);

?>

@if( ! is_bool($summary->entradas ) )

    @component('components.table')
        @slot('hover', true)
        @slot('thead', ['Número','Destinatario',''])
        @slot('tbody')
        @foreach($summary->entradas as $entrada)
        <tr>
            <td style="min-width:288px">{{ $entrada->numero }}</td>
            <td style="min-width:288px">
                @if( $entrada->destinatario )
                <span class="d-block">{{ $entrada->destinatario->direccion ?? '' }}</span>
                <small>{{ $entrada->destinatario->localidad }}</small>

                @else
                <small class="text-muted">Pendiente</small>

                @endif
            </td>
            <td class='text-end'>
                <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-sm btn-primary">{!! $icons->eye !!}</a>
            </td>
        </tr>
        @endforeach
        @endslot
    @endcomponent

@endif
