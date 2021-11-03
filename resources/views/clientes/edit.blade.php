@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar cliente'
])
    <form action="{{ route('clientes.update', $cliente) }}" method="post" autocomplete="off">
        @method('put')
        @include('clientes._save')
        <br>
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit">Actualizar cliente</button>
            <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-secondary">Regresar</a>
            @endslot
            
            @slot('right')
            @include('@.partials.modal-confirm-delete.trigger', ['only' => 'text'])
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $cliente])

@component('@.partials.modal-confirm-delete.modal', [
    'route' => route('clientes.destroy', $cliente),
])
    <p>Si eliminas el cliente "{{ $cliente->nombre }}", no estará disponible para consolidados y entradas.</p>
    <p>
        <small>Se conservará los consolidados y las entradas <br>ya existentes de este cliente.</small>
    </p>
@endcomponent

@endsection
