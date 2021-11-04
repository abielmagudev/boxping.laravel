@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Etapas',
    'counter' => $etapas->count()
])
    @slot('options')
    <a href="{{ route('etapas.create') }}" class="btn btn-sm btn-primary">
        <span class="fw-bold">+</span>
    </a>
    @endslot
    @component('@.bootstrap.table', [
        'thead' => ['Orden','Nombre','Tareas'],
    ])
        @foreach($etapas as $etapa)
        <tr>
            <td>{{ $etapa->orden }}</td>
            <td>{{ $etapa->nombre }}</td>
            <td>{!! $etapa->descripcionesTareas(', ') !!}</td>
            <td class="text-end">
                <a href="{{ route('etapas.show', $etapa) }}" class="btn btn-sm btn-outline-primary">
                    @include('@.bootstrap.icon', ['icon' => 'eye'])
                </a>
                <a href="{{ route('etapas.edit', $etapa) }}" class="btn btn-sm btn-outline-warning">
                    @include('@.bootstrap.icon', ['icon' => 'pencil-fill'])
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent
@endcomponent
<br>

@endsection
