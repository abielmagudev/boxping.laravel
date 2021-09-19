@extends('app')
@section('content')

@component('@.subnavs.etapas-alertas')
    @slot('active', 1)
@endcomponent

@component('@.bootstrap.page-header', [
    'title' => 'Etapas',
    'counter' => $etapas->count()
])   
    @slot('options')
    <a href="{{ route('etapas.create') }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none fw-bold">+</span>
        <span class="d-none d-md-block">Nueva etapa</span>
    </a>
    @endslot
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    @component('@.bootstrap.table', [
        'thead' => ['Orden','Nombre','Tareas'],
    ])
        @slot('tbody')
        @foreach($etapas as $etapa)
        <tr>
            <td>{{ $etapa->orden }}</td>
            <td>{{ $etapa->nombre }}</td>
            <td>{!! $etapa->descripcionesTareas(', ') !!}</td>
            <td class="text-end">
                <a href="{{ route('etapas.show', $etapa) }}" class="btn btn-sm btn-outline-primary">
                    {!! $svg->eye !!}
                </a>
            </td>
        </tr>
        @endforeach
        @endslot
    @endcomponent
    @endslot
@endcomponent
<br>

@endsection
