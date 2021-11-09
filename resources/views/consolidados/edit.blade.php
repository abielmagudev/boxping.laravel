@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar consolidado',
])
    <form action="{{ route('consolidados.update', $consolidado) }}" method="post" autocomplete="off">
        @method('patch')
        @include('consolidados._save')

        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit">Actualizar consolidado</button>
            <a href="{{ route('consolidados.show', $consolidado) }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
            @include('@.partials.modal-confirm-delete.trigger', ['only' => 'text'])
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $consolidado])

@component('@.partials.modal-confirm-delete.modal', [
    'route' => route('consolidados.destroy', $consolidado),
    'category' => 'consolidado', 
    'name' => $consolidado->numero,
    'is_hard' => true,
])
<div class="border border-danger rounded p-3 my-3">
    <div class="form-check d-flex align-items-center justify-content-center">
        <input class="form-check-input border-danger mt-0 me-1" type="checkbox" name="eliminar_entradas" value="yes" id="checkbox-eliminar-entradas">
        <label class="form-check-label" for="checkbox-eliminar-entradas">Eliminar las {{ $consolidado->entradas->count() }} entradas del consolidado.</label>
    </div>
</div>
@endcomponent

@endsection
