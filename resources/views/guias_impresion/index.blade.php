@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'counter' => $guias->count(),
    'title' => 'Guías de impresión',
])
    @slot('options')
    <a href="{{ route('guias_impresion.create') }}" class="btn btn-sm btn-primary">
        <span class="fw-bold">+</span>
    </a>
    @endslot
    @component('@.bootstrap.table', [
        'thead' => ['Nombre', 'Impresiones (intentos)'],
    ])
        @foreach($guias as $guia)
        <tr>
            <td>{{ $guia->nombre }}</td>
            <td>{{ $guia->intentos }}</td>
            <td class="text-end">
                <a href="{{ route('guias_impresion.edit', $guia) }}" class="btn btn-sm btn-outline-warning">
                    @include('@.bootstrap.icon', ['icon' => 'pencil-fill'])
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent
@endcomponent

@endsection
