@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'goback' => route('etapas.index'),
    'pretitle' => 'Etapa',
    'title' => $etapa->nombre,
])
    @slot('options')
    <a href="{{ route('etapas.edit', $etapa) }}" class="btn btn-sm btn-warning">
        <span class="d-block d-md-none fw-bold">{!! $svg->pencil !!}</span>
        <span class="d-none d-md-block">Editar</span>
    </a>
    @endslot
@endcomponent

<div class="row">
    <!-- Column informacion -->
    <div class="col-sm mb-3 mb-md-0">
        @component('@.bootstrap.card')
            @slot('header', 'Información')
            @slot('body')
            <p class="m-0">
                <small class="d-block text-muted small">Tareas</small>
            </p>
            <ul class="list-unstyled">
                @forelse($etapa->descripcionesTareas() as $descripcion)
                <li>{{ $descripcion }}</li>

                @empty
                <li>Solamente registrar</li>

                @endforelse
            </ul>
            <p>
                <small class="d-block text-muted small">Medición de peso</small>
                <span class="text-capitalize">{{ $etapa->nombreMedicionUnicaPeso }}</span>
            </p>
            <p>
                <small class="d-block text-muted small">Medición de volúmen</small>
                <span class="text-capitalize">{{ $etapa->nombreMedicionUnicaVolumen }}</span>
            </p>
            @endslot
        @endcomponent   
    </div>

    <!-- Column zonas -->
    <div class="col-sm col-sm-8">
        @component('@.bootstrap.card')
            @slot('header')
            @component('@.bootstrap.grid-left-right')
                @slot('left')
                <span>Zonas</span>
                @endslot

                @slot('right')
                <a href="{{ route('zonas.create', $etapa) }}" class="btn btn-sm btn-primary">
                    <span class="d-block d-md-none fw-bold">+</span>
                    <span class="d-none d-md-block">Nueva zona</span>
                </a>
                @endslot
            @endcomponent
            @endslot

            @slot('body')

            @if( $etapa->zonas->count() )
            @component('@.bootstrap.table', [
                'thead' => ['Nombre','Descripción'],
            ])
                @slot('tbody')
                @foreach($etapa->zonas->sortByDesc('id') as $zona)
                <tr>
                    <td>{{ $zona->nombre }}</td>
                    <td>{{ $zona->descripcion }}</td>
                    <td class="text-end">
                        <a href="{{ route('zonas.edit', [$etapa, $zona]) }}" class="btn btn-sm btn-outline-warning">
                            {!! $svg->pencil !!}
                        </a>
                    </td>
                </tr>
                @endforeach
                @endslot
            @endcomponent
            @endif

            @endslot
        @endcomponent     
    </div>
</div>
<br>

@endsection
