@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => 'Editar consolidado',
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('consolidados.update', $consolidado) }}" method="post" autocomplete="off">
        @method('patch')
        @include('consolidados._save')
        <button class="btn btn-warning" type="submit">Actualizar consolidado</button>
        <a href="{{ route('consolidados.show', $consolidado) }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot
    @slot('footer')
    @component('@.partials.block-modifiers')
        @slot('model', $consolidado)
    @endcomponent
    @endslot
@endcomponent
<br>

@component('@.partials.modal-confirm-delete', [
    'route' => route('consolidados.destroy', $consolidado),
    'text' => 'Eliminar consolidado',
])
    @slot('content')
    <p class="lead">¿Deseas eliminar consolidado <b>{{ $consolidado->numero }}</b>?</p>
    <div class="border py-3 mx-4">
        <span class="small text-muted">Total de entradas</span>
        <b class="small">{{ $consolidado->entradas->count() }}</b>
    </div>
    @endslot
@endcomponent
<br>

@endsection
