@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar incidente',    
])
    <form action="{{ route('incidentes.update', $incidente) }}" method="post" autocomplete="off">
        @method('put')
        @include('incidentes._save')
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit">Actualizar incidente</button>
            <a href="{{ route('incidentes.index') }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
            @include('@.partials.modal-confirm-delete.trigger', ['only' => 'text'])
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $incidente])

@include('@.partials.modal-confirm-delete.modal', [
    'route' => route('incidentes.destroy', $incidente),
    'category' => 'incidente',
    'name' => $incidente->nombre,
    'is_hard' => true,
])
<br>

@endsection
