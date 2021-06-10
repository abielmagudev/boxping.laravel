@extends('app')
@section('content')

@component('@.bootstrap.header')
    @slot('title', 'Transportadoras')
    @slot('counter', $transportadoras->count())
    @slot('options')
    <a href="{{ route('transportadoras.create') }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none fw-bold">+</span>
        <span class="d-none d-md-block">Nueva transportadora</span>
    </a>
    @endslot
@endcomponent

@component('@.bootstrap.card')
    @slot('body')

    @component('@.bootstrap.table')
        @slot('thead', ['Nombre', 'Teléfono', 'Web', ''])
       
        @slot('tbody')
        @foreach($transportadoras as $transportadora)
        <tr>
            <td class="text-nowrap">{{ $transportadora->nombre }}</td>
            <td class="text-nowrap">{{ $transportadora->telefono }}</td>
            <td class="text-nowrap">
                <a href="{{ $transportadora->web }}" class="link-primary" target="_blank">{{ $transportadora->web }}</a>
            </td>
            <td class="text-nowrap text-end">
                <a href="{{ route('transportadoras.show', $transportadora) }}" class="btn btn-sm btn-outline-primary">{!! $svg->eye !!}</a>
            </td>
        </tr>
        @endforeach
        @endslot

    @endcomponent

    @endslot
@endcomponent
@endsection
