@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar conductor'    
])
    <form action="{{ route('conductores.update', $conductor) }}" method="post" autocomplete="off">
        @method('put')
        @include('conductores._save')
        <br>
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning">Actualizar conductor</button>
            <a href="{{ route('conductores.index') }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
            @include('@.partials.modal-confirm-delete.trigger', ['only' => 'text'])
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>
    
@include('@.partials.block-modifiers.content', ['model' => $conductor])

@include('@.partials.modal-confirm-delete.modal', [
    'route' => route('conductores.destroy', $conductor),
    'category' => 'conductor',
    'name' => $conductor->nombre
])

@endsection
