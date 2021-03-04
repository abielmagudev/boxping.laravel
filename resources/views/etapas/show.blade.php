@extends('app')
@section('content')

@component('components.header', [
    'title' => $etapa->nombre,
    'subtitle' => 'Etapa', 
    'goback' => route('etapas.index'),
])
    @slot('options')
    <a href="{{ route('etapas.edit', $etapa) }}" class="btn btn-sm btn-warning">Editar etapa</a>
    @endslot
@endcomponent

<div class="row">
    <!-- Column left -->
    <div class="col-sm col-sm-4 d-flex flex-column">
        @component('components.card', [
            'classes' => 'flex-grow-1',
            'header_title' => 'Información',
        ])
            @slot('body')
            <p>
                <small class="d-block text-muted small">Realiza medición</small>
                <span>{{ $etapa->realiza_medicion ? 'Si' : 'No' }}</span>
            </p>
            <p>
                <small class="d-block text-muted small">Medida de peso</small>
                <span class="text-capitalize">{{ $etapa->unica_medida_peso ?? 'Opcional' }}</span>
            </p>
            <p>
                <small class="d-block text-muted small">Medida de volúmen</small>
                <span class="text-capitalize">{{ $etapa->unica_medida_volumen ?? 'Opcional' }}</span>
            </p>
            @endslot
        @endcomponent   
    </div>

    <!-- Column right -->
    <div class="col-sm">
        @component('components.card', [
            'header_title' => 'Zonas',
            'header_title_badge' => $etapa->zonas->count(),
        ])
            @slot('header_options')
            <a href="{{ route('zonas.create', $etapa) }}" class="btn btn-sm btn-primary">Nueva zona</a>
            @endslot

            @slot('body')
            
            @if( $etapa->zonas->count() )
            @component('components.table', [
                'thead' => ['Nombre','Descripción',''],
            ])
                @slot('tbody')
                @foreach($etapa->zonas->sortByDesc('id') as $zona)
                <tr>
                    <td class="">{{ $zona->nombre }}</td>
                    <td class="">{{ $zona->descripcion }}</td>
                    <td class="text-end">
                        <a href="{{ route('zonas.edit', [$etapa, $zona]) }}" class="btn btn-warning btn-sm">
                            {!! $icons->pencil !!}
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

@endsection
