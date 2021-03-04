@extends('app')
@section('content')
@component('components.card', [
    'header_title' => 'Editar transportadora',
])
    @slot('body')
    <form action="{{ route('transportadoras.update', $transportadora) }}" method="post" autocomplete="off">
        @method('put')
        @include('transportadoras._save')
        <br>
        <button type="submit" class="btn btn-warning">Actualizar transportadora</button>
        <a href="{{ route('transportadoras.show', $transportadora) }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot

    @slot('footer')
    @component('partials.modal-confirm-delete', [
        'route' => route('transportadoras.destroy', $transportadora),
        'trigger_text' => 'Eliminar transportadora',
        'trigger_align' => 'right'
    ])
        @slot('body')
        <p class="text-muted">
            <span class="d-block">Se eliminará la transportadora</span>
            <span class="fw-bold">{{ $transportadora->nombre }}</span>
        </p>
        @endslot
    @endcomponent
    @endslot
@endcomponent

@component('partials.section-modifiers', [
    'concept' => $transportadora
])
@endcomponent
@endsection
