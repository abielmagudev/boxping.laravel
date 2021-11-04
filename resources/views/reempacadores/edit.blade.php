@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar reempacador',    
])
    <form action="{{ route('reempacadores.update', $reempacador) }}" method="post" autocomplete="off">
        @method('patch')
        @include('reempacadores._save')
        <br>

        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit">Actualizar reempacador</button>
            <a href="{{ route('reempacadores.index') }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
            @include('@.partials.modal-confirm-delete.trigger', ['only' => 'text'])
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $reempacador])

@component('@.partials.modal-confirm-delete.modal', [
    'route' => route('reempacadores.destroy', $reempacador),
    'name' => $reempacador->nombre,
    'category' => 'reempacador',
])
@endcomponent

@endsection
