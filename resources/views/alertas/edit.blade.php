@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar alerta'
])
    <form action="{{ route('alertas.update', $alerta) }}" method="post" autocomplete="off">
        @method('put')
        @include('alertas._save')
        <br>
        <button type="submit" class="btn btn-warning">Actualizar alerta</button>
        <a href="{{ route('alertas.index') }}" class="btn btn-secondary">Regresar</a>
    </form>

    @slot('footer')
        @include('@.partials.modifiers-block', [
            'model' => $alerta
        ])
    @endslot
@endcomponent
<br>

<div class="text-end">
    @component('@.partials.confirm-delete.bundle', [
        'route' => route('alertas.destroy', $alerta),
        'text' => 'Eliminar alerta',
    ])
        @slot('content')
        <p class="lead">¿Deseas eliminar alerta <b>{{ $alerta->nombre }}</b>?</p>
        @endslot
    @endcomponent
</div>
<br>

@endsection
