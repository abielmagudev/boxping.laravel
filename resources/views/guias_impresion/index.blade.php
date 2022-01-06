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
        'thead' => ['Nombre', 'Descripción', 'Activada', 'Intentos de impresión'],
    ])
        @foreach($guias as $guia)
        <tr>
            <td>{{ $guia->nombre }}</td>
            <td>{{ $guia->descripcion }}</td>
            <td>{{ $guia->isActivada() ? 'Si' : 'No' }}</td>
            <td>{{ $guia->intentos_impresion }}</td>
            <td class="text-end">
                <a href="{{ route('guias_impresion.edit', $guia) }}" class="btn btn-sm btn-outline-warning">
                    {!! $graffiti->design('pencil-fill')->svg() !!}
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent
@endcomponent

@endsection
