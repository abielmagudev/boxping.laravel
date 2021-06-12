@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => 'Editar cliente',
])
@endcomponent

@component('@.bootstrap.card')
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
    @component('@.partials.modifiers')
        @slot('model', $cliente)
    @endcomponent
    @endslot
@endcomponent
<br>

@component('@.partials.modal-confirm-delete', [
    'route' => route('clientes.destroy', $cliente),
    'text' => 'Eliminar cliente'
])
    @slot('content')
    <p class="lead">¿Deseas eliminar cliente <b>{{ $cliente->nombre }}</b>?</p>
    @endslot
@endcomponent
<br>

@endsection
