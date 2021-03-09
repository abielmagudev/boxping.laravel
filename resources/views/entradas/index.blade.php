@extends('app')
@section('content')

@component('components.card')
    @slot('header_title', 'Entradas')
    @slot('header_title_badge', $entradas->total())
    @slot('header_options')
    <a href="{{ route('entradas.create') }}" class="btn btn-sm btn-outline-primary">
        <span>Nueva entrada</span>
    </a>
    @endslot
    @slot('body')
    @component('components.table')
        @slot('thead', ['Número','Consolidado','Cliente','Destinatario'])
        @slot('tbody')
        @foreach($entradas as $entrada)
        <tr>
            <td>{{ $entrada->numero }}</td>
            <td>
                @if( $entrada->consolidado )
                <span>{{ $entrada->consolidado->numero }}</span>

                @else
                <span class="text-muted small text-uppercase">Sin consolidar</span>

                @endif
            </td>
            <td>{{ $entrada->cliente->alias }}</td>
            <td>{{ $entrada->destinatario_id ? 'Si' : 'No' }}</td>
            <td class="text-end">
                <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-sm btn-primary">
                    {!! $icons->eye !!}
                </a>
            </td>
        </tr>
        @endforeach
        @endslot
    @endcomponent
    @endslot
@endcomponent

@component('components.pagination-simple')
    @slot('collection', $entradas)
@endcomponent
<br>

@endsection
