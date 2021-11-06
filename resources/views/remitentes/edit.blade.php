@extends('app')
@section('content')
    
@component('@.bootstrap.card', [
    'title' => 'Editar remitente' 
])
    <form action="{{ route('remitentes.update', $remitente) }}" method="post" autocomplete="off">
        @method('patch')
        @include('remitentes._save')
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button type="submit" class="btn btn-warning">Actualizar remitente</button>
            <a href="{{ route('remitentes.index') }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
            @include('@.partials.modal-confirm-delete.trigger', ['only' => 'text'])
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $remitente])

@include('@.partials.modal-confirm-delete.modal', [
    'route' => route('remitentes.destroy', $remitente),
    'name' => $remitente->nombre,
    'category' => 'remitente'
])

@endsection
