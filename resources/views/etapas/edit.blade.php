@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar etapa'    
])
    <form action="{{ route('etapas.update', $etapa) }}" method="post" autocomplete="off">
        @method('patch')
        @include('etapas._save')
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit">Actualizar etapa</button>
            <a href="{{ route('etapas.index') }}" class="btn btn-secondary">Regresar</a>
            @endslot
            
            @slot('right')
                @component('@.partials.modal-delete-confirm', [
                    'route' => route('etapas.destroy', $etapa),
                ])
                    <div class="text-center">
                        <p class="m-0 lead text-muted">Se eliminará etapa</p>
                        <p class="m-0 lead fw-bold">{{ $etapa->nombre }}</p>
                        <p class="badge bg-secondary">{{ $etapa->zonas->count() }} zonas</p>
                    </div>
                @endcomponent
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers', ['model' => $etapa])

@endsection
