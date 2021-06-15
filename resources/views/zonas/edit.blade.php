@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'pretitle' => "Etapa {$etapa->nombre}",
    'title' => 'Editar zona'
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('zonas.update', [$etapa, $zona]) }}" method="post" autocomplete="off">
        @method('patch')
        @include('zonas._save')
        <br>
        <button class="btn btn-warning" type="submit">Actualizar zona</button>
        <a href="{{ route('etapas.show', $etapa) }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot

    @slot('footer')
    @component('@.partials.block-modifiers')
    @endcomponent
    @endslot

@endcomponent
<br>

@component('@.partials.modal-confirm-delete', [
    'route' => route('zonas.destroy', [$etapa, $zona]),
    'text' => 'Eliminar zona',
])
    @slot('content')
    <p class="lead">¿Deseas eliminar zona <b>{{ $zona->nombre }}</b>?</p>
    @endslot
@endcomponent
<br>

@endsection
