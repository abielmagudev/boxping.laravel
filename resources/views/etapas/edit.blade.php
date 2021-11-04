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
            @include('@.partials.modal-confirm-delete.trigger', ['only' => 'text'])
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $etapa])

@component('@.partials.modal-confirm-delete.modal', [
    'route' => route('etapas.destroy', $etapa),
])
    <p>Al eliminar etapa <em>{{ $etapa->nombre }}</em> <br> no estará disponible para próximas entradas.</p>
    <p>
        <small>(Se conservará las entradas existentes de esta etapa)</small>
    </p>
@endcomponent

@endsection
