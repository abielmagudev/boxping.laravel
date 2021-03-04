@extends('app')
@section('content')

@component('partials.subnav-salidas')
    @slot('active','transportadoras')
@endcomponent

@component('components.card', [
    'header_title' => 'Transportadoras',
    'header_title_badge' => $transportadoras->count(),
])
    @slot('header_options')
    <a href="{{ route('transportadoras.create') }}" class="btn btn-sm btn-outline-primary">Nueva transportadora</a>
    @endslot

    @slot('body')
    @component('components.table', [
        'thead' => ['Nombre','Sitio web','Teléfono'],
    ])
        @slot('tbody')
        @foreach($transportadoras as $transportadora)
        <tr>
            <td class="text-nowrap">{{ $transportadora->nombre }}</td>
            <td class="text-nowrap">
                <a href="{{ $transportadora->web }}" target="_blank">{{ $transportadora->web }}</a>
            </td>
            <td class="text-nowrap">{{ $transportadora->telefono }}</td>
            <td class="text-nowrap text-end">
                <a href="{{ route('transportadoras.show', $transportadora) }}" class="btn btn-sm btn-primary">
                    {!! $icons->eye !!}
                </a>
            </td>
        </tr>
        @endforeach
        @endslot
    @endcomponent
    @endslot
@endcomponent
@endsection
