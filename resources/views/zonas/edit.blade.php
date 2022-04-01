@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'pretitle' => "Etapa {$etapa->nombre}",
    'title' => 'Editar zona',    
])
    <form action="{{ route('zonas.update', [$etapa, $zona]) }}" method="post" autocomplete="off">
        @method('patch')
        @include('zonas._save')
        <br>
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit">Actualizar zona</button>
            <a href="{{ route('etapas.show', $etapa) }}" class="btn btn-secondary">Regresar</a>
            @endslot
            
            @slot('right')
                @component('@.partials.modal-delete-confirm', [
                    'route' => route('zonas.destroy', [$etapa, $zona]),
                    'destroy' => true,
                ])
                    <div class="text-center">
                        <p class="m-0 lead text-muted">Se eliminará zona</p>
                        <p class="m-0 lead fw-bold">{{ $zona->nombre }}</p>
                        <p class="small">{{ $etapa->nombre }}</p>
                    </div>
                @endcomponent
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $zona])

@endsection
