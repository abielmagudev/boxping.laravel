@extends('app')
@section('content')

@component('components.card', [
    'header_title' => 'Reempacadores',
    'header_title_badge' => $reempacadores->count(),
])
    @slot('header_options')
    <a href="{{ route('reempacadores.create') }}" class="btn btn-sm btn-outline-primary">Nuevo reempacador</a>
    @endslot

    @slot('body')
    @component('components.table')
        @slot('tbody')
        @foreach($reempacadores as $reempacador)
        <tr>
            <td>{{ $reempacador->nombre }}</td>
            <td class="text-nowrap text-end">
                <a href="{{ route('reempacadores.show', $reempacador) }}" class="btn btn-sm btn-primary">
                    {!! $icons->eye !!}
                </a>
                <a href="{{ route('reempacadores.edit', $reempacador) }}" class="btn btn-sm btn-warning">
                    {!! $icons->pencil !!}
                </a>
            </td>
        </tr>
        @endforeach
        @endslot
    @endcomponent
    @endslot
@endcomponent

@endsection
