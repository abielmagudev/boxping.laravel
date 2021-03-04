@extends('app')
@section('content')
@component('components.card', [
    'header_title' => 'Editar incidente'
])
    @slot('body')
    <form action="{{ route('incidentes.update', $incidente) }}" method="post" autocomplete="off">
        @method('put')
        @include('incidentes._save')
        <br>
        <button class="btn btn-warning" type="submit">Actualizar incidente</button>
        <a href="{{ route('incidentes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endslot

    @slot('footer')
    @component('partials.modal-confirm-delete', [
        'route' => route('incidentes.destroy', $incidente),
        'trigger_text' => 'Eliminar incidente',
        'trigger_align' => 'right'
    ])
        @slot('body')
        <p class="text-muted">
            <span class="d-block">Se eliminará el incidente</span>
            <span class="fw-bold">{{ $incidente->titulo }}</span>
        </p>
        @endslot
    @endcomponent
    @endslot
@endcomponent

@component('partials.section-modifiers', [
    'concept' => $incidente
])
@endcomponent
@endsection
