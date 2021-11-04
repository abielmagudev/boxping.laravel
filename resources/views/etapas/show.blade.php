@extends('app')
@section('content')

@include('@.bootstrap.page-header', [
    'pretitle' => 'Etapa',
    'title' => $etapa->nombre,
])

<div class="row">
    <!-- Column informacion -->
    <div class="col-sm mb-3 mb-md-0">
        @component('@.bootstrap.card', [
            'title' => 'Información'
        ])
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
        @endcomponent   
    </div>

    <!-- Column zonas -->
    <div class="col-sm col-sm-8">
        @component('@.bootstrap.card', [
            'title' => 'Zonas',
        ])
            @slot('options')
            <a href="{{ route('zonas.create', $etapa) }}" class="btn btn-sm btn-primary">
                <span class="fw-bold">+</span>
            </a>
            @endslot

            @component('@.bootstrap.table', [
                'thead' => ['Nombre','Descripción'],
            ])
                @foreach($etapa->zonas->sortByDesc('id') as $zona)
                <tr>
                    <td>{{ $zona->nombre }}</td>
                    <td>{{ $zona->descripcion }}</td>
                    <td class="text-end">
                        <a href="{{ route('zonas.edit', [$etapa, $zona]) }}" class="btn btn-sm btn-outline-warning">
                            @include('@.bootstrap.icon', ['icon' => 'pencil-fill'])
                        </a>
                    </td>
                </tr>
                @endforeach
            @endcomponent

        @endcomponent     
    </div>
</div>
<br>

@endsection
