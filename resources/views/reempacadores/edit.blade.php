@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'title' => 'Editar reempacador',
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('reempacadores.update', $reempacador) }}" method="post" autocomplete="off">
        @method('patch')
        @include('reempacadores._save')
        <br>
        <button class="btn btn-warning" type="submit">Actualizar reempacador</button>
        <a href="{{ route('reempacadores.index') }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot

    @slot('footer')
        @include('@.partials.modifiers-block', [
            'model' => $reempacador
        ])
    @endslot
@endcomponent
<br>

<div class="text-end">
    @component('@.partials.confirm-delete.bundle', [
        'route' => route('reempacadores.destroy', $reempacador),
        'text' => 'Eliminar reempacador'
    ])
        @slot('content')
        <p class="lead">¿Deseas eliminar reempacador <b>{{ $reempacador->nombre }}</b>?</p>
        @endslot
    @endcomponent
</div>
<br>

@endsection
