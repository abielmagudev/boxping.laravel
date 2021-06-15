@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => 'Editar etapa'
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('etapas.update', $etapa) }}" method="post" autocomplete="off">
        @method('patch')
        @include('etapas._save')
        <button class="btn btn-warning" type="submit">Actualizar etapa</button>
        <a href="{{ route('etapas.show', $etapa) }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot

    @slot('footer')
    @component('@.partials.block-modifiers', [
        'model' => $etapa
    ])
    @endcomponent
    @endslot
@endcomponent
<br>

@component('@.partials.modal-confirm-delete', [
    'route' => route('etapas.destroy', $etapa),
    'text' => 'Eliminar etapa',
])
    @slot('content')
    <p class="lead">¿Deseas eliminar etapa <b>{{ $etapa->nombre }}</b>?</p>
    @endslot
@endcomponent
<br>

@endsection
