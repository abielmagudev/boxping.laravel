@extends('app')
@section('content')

@component('components.card', [
    'header_title' => 'Editar cliente'
])
    @slot('body')
    <form action="{{ route('clientes.update', $cliente) }}" method="post" autocomplete="off">
        @method('put')
        @include('clientes._save')
        <br>
        <button class="btn btn-warning" type="submit">Actualizar cliente</button>
        <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot

    @slot('footer')
    @component('partials.modal-confirm-delete', [
        'route' => route('clientes.destroy', $cliente),
        'trigger_text' => 'Eliminar cliente',
        'trigger_align' => 'right',
    ])
        @slot('body')
        <p>Se eliminará el cliente <span class="fw-bold">{{ $cliente->nombre }}</span></p>
        @endslot
    @endcomponent
    @endslot
@endcomponent

@component('partials.section-modifiers', [
    'concept' => $cliente,
])
@endcomponent

@endsection
