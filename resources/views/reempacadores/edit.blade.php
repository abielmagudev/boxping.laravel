@extends('app')
@section('content')
@component('components.card', [
    'header_title' => 'Editar reempacador',
])
    @slot('body')
    <form action="{{ route('reempacadores.update', $reempacador) }}" method="post" autocomplete="off">
        @method('patch')
        @include('reempacadores._save')
        <br>
        <button class="btn btn-warning" type="submit">Actualizar reempacador</button>
        <a href="{{ route('reempaque.index') }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot

    @slot('footer')
    @component('partials.modal-confirm-delete', [
        'route' => route('reempacadores.destroy', $reempacador),
        'trigger_align' => 'right',
        'trigger_text' => 'Eliminar reempacador'
    ])
        @slot('body')
        <p>
            <span class="d-block">Se eliminará el reempacador</span>
            <span class="fw-bold">{{ $reempacador->nombre }}</span>
        </p>
        @endslot
    @endcomponent
    @endslot
@endcomponent

@component('partials.section-modifiers', [
    'concept' => $reempacador,
])
@endcomponent

@endsection
