@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => 'Editar alerta'
])
@endcomponent

@component('@.bootstrap.card')
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
    @component('@.partials.block-modifiers', [
        'model' => $alerta
    ])
    @endcomponent
    @endslot
@endcomponent
<br>

@component('@.partials.modal-confirm-delete', [
    'route' => route('alertas.destroy', $alerta),
    'text' => 'Eliminar alerta',
])
    @slot('content')
    <p class="lead">¿Deseas eliminar alerta <b>{{ $alerta->nombre }}</b>?</p>
    @endslot
@endcomponent
<br>

@endsection
