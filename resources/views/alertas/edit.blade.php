@extends('app')
@section('content')
@component('components.card', [
    'header_title' => 'Editar alerta',
])
    @slot('body')
    <form action="{{ route('alertas.update', $alerta) }}" method="post" autocomplete="off">
        @method('put')
        @include('alertas._save')
        <br>
        <button type="submit" class="btn btn-warning">Actualizar alerta</button>
        <a href="{{ route('alertas.index') }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot

    @slot('footer')
    @component('partials.modal-confirm-delete', [
        'route' => route('alertas.destroy',$alerta),
        'trigger_text' => 'Eliminar alerta',
        'trigger_align' => 'right',
    ])
        @slot('body')
        <p class="text-muted">Se eliminará la alerta <span class="fw-bold">{{ $alerta->nombre }}</span></p>
        @endslot
    @endcomponent
    @endslot
@endcomponent

@component('partials.section-modifiers', [
    'concept' => $alerta,
])
@endcomponent
@endsection
