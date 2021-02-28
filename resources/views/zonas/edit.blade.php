@extends('app')
@section('content')
@component('components.card', [
    'header_title' => 'Editar zona',
])
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
    @component('partials.modal-confirm-delete', [
        'route' => route('zonas.destroy', [$etapa, $zona]),
        'trigger_text' => 'Eliminar zona',
        'trigger_align' => 'right',
    ])
        @slot('body')
        <p class="text-muted">Se eliminará la zona <span class="fw-bold">{{ $zona->nombre }}</span> <br> de la etapa {{ $etapa->nombre }}</p>
        @endslot
    @endcomponent
    @endslot

@endcomponent

@component('partials.section-modifiers', [
    'concept' => $zona
])
@endcomponent
@endsection
