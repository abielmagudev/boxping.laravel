@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'counter' => $guias->count(),
    'title' => 'Guías de impresión',
])
    @slot('options')
    <a href="{{ route('guias_impresion.create') }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none fw-bold">+</span>
        <span class="d-none d-md-block">Nueva guía de impresión</span>
    </a>
    @endslot
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    @component('@.bootstrap.table')
        @slot('thead', ['Nombre', 'Impresiones (intentos)'])
        @slot('tbody')
        @foreach($guias as $guia)
        <tr>
            <td>{{ $guia->nombre }}</td>
            <td>{{ $guia->intentos }}</td>
            <td class="text-end">
                <a href="{{ route('guias_impresion.edit', $guia) }}" class="btn btn-sm btn-outline-warning">e</a>
            </td>
        </tr>
        @endforeach
        @endslot
    @endcomponent
    @endslot
@endcomponent

@endsection
