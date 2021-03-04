@extends('app')
@section('content')

@component('partials.subnav-reempaque')
    @slot('active', 'códigos')
@endcomponent

@component('components.card', [
    'header_title' => 'Códigos de reempacado',
    'header_title_badge' => $codigosr->count(),
])
    @slot('header_options')
    <a href="{{ route('codigosr.create') }}" class="btn btn-sm btn-outline-primary">Nuevo código</a>
    @endslot

    @slot('body')
    @component('components.table', [
        'thead' => ['Nombre','Descripción',''],
    ])
        @slot('tbody')
        @foreach($codigosr as $codigor)
        <tr>
            <td>{{ $codigor->nombre }}</td>
            <td>{{ $codigor->descripcion }}</td>
            <td class="text-nowrap text-end">
                <a href="{{ route('codigosr.show', $codigor) }}" class="btn btn-sm btn-primary">
                    {!! $icons->eye !!}
                </a>
                <a href="{{ route('codigosr.edit', $codigor) }}" class="btn btn-sm btn-warning">
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
