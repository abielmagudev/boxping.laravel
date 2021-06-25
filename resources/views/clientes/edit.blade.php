@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
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
        @include('@.partials.modifiers-block', [
            'model' => $cliente,
        ])
    @endslot
@endcomponent
<br>

<div class="text-end">
    @component('@.partials.confirm-delete.bundle', [
        'route' => route('clientes.destroy', $cliente),
        'text' => 'Eliminar cliente'
    ])
        @slot('content')
        <p class="lead">¿Deseas eliminar cliente <b>{{ $cliente->nombre }}</b>?</p>
        @endslot
    @endcomponent
</div>
<br>

@endsection
