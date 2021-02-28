@extends('app')
@section('content')
@component('components.card', [
    'header_title' => 'Editar etapa',
])
    @slot('body')
    <form action="{{ route('etapas.update', $etapa) }}" method="post" autocomplete="off">
        @method('patch')
        @include('etapas._save')
        <button class="btn btn-warning" type="submit">Actualizar etapa</button>
        <a href="{{ route('etapas.show', $etapa) }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot

    @slot('footer')
    @component('partials.modal-confirm-delete', [
        'route' => route('etapas.destroy', $etapa),
        'trigger_align' => 'right',
        'trigger_text' => 'Eliminar etapa',
    ])
        @slot('body')
        <p class="text-center">
            <span>Se eliminará etapa</span>
            <br>
            <span class="lead fw-bold">{{ $etapa->nombre }}</span>
        </p>
        @endslot
    @endcomponent
    @endslot
@endcomponent

@component('partials.section-modifiers', [
    'concept' => $etapa,
])
@endcomponent

@endsection
