@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar alerta'
])
    <form action="{{ route('alertas.update', $alerta) }}" method="post" autocomplete="off">
        @method('put')
        @include('alertas._save')
        <br>

    @component('@.bootstrap.grid-left-right')
        @slot('left')
        <button type="submit" class="btn btn-warning">Actualizar alerta</button>
        <a href="{{ route('alertas.index') }}" class="btn btn-secondary">Regresar</a>
        @endslot
        
        @slot('right')
        @include('@.partials.modal-confirm-delete.trigger', ['only' => 'text'])
        @endslot
    @endcomponent
    </form>
@endcomponent
<br>

<div class="my-3">
    @include('@.partials.block-modifiers.content', ['model' => $alerta])
</div>

@include('@.partials.modal-confirm-delete.modal', [
    'route' => route('alertas.destroy', $alerta),
    'category' => 'alerta',
    'name' => $alerta->nombre,
    'is_hard' => true,
])

@endsection
