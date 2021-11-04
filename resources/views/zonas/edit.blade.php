@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'pretitle' => "Etapa {$etapa->nombre}",
    'title' => 'Editar zona',    
])
    <form action="{{ route('zonas.update', [$etapa, $zona]) }}" method="post" autocomplete="off">
        @method('patch')
        @include('zonas._save')
        <br>
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit">Actualizar zona</button>
            <a href="{{ route('etapas.show', $etapa) }}" class="btn btn-secondary">Regresar</a>
            @endslot
            
            @slot('right')
            @include('@.partials.modal-confirm-delete.trigger', ['only' => 'text'])
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@component('@.partials.modal-confirm-delete.modal', [
    'route' => route('zonas.destroy', [$etapa, $zona]),
    'warning' => true,
])
    <p>Al eliminar zona <em>{{ $zona->nombre }}</em> <br> no estará disponible en la etapa {{ $etapa->nombre }}.</p>
@endcomponent

@endsection
