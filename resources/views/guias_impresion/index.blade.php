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
        'thead' => ['Disponible', 'Nombre', 'Descripción', 'Intentos de impresión'],
    ])
        @foreach($guias as $guia)
        <tr>
            <td class="text-center <?= $guia->isActivada() ? 'text-success' : 'text-muted' ?>">
                {!! $graffiti->design('check-circle-fill')->svg() !!}
            </td>
            <td>{{ $guia->nombre }}</td>
            <td>{{ $guia->descripcion }}</td>
            <td class="text-center">{{ $guia->intentos }}</td>
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
