@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'pretitle' => "Etapa {$etapa->nombre}",
    'title' => 'Editar zona',
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
        @include('@.partials.modifiers-block')
    @endslot

@endcomponent
<br>

<div class="text-end">
    @component('@.partials.confirm-delete.bundle', [
        'route' => route('zonas.destroy', [$etapa, $zona]),
        'text' => 'Eliminar zona',
    ])
        @slot('content')
        <p class="lead">¿Deseas eliminar zona <b>{{ $zona->nombre }}</b>?</p>
        @endslot
    @endcomponent
</div>
<br>

@endsection
