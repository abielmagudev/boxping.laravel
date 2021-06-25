@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'title' => 'Editar consolidado',
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('consolidados.update', $consolidado) }}" method="post" autocomplete="off">
        @method('patch')
        @include('consolidados._save')
        <button class="btn btn-warning" type="submit">Actualizar consolidado</button>
        <a href="{{ route('consolidados.show', $consolidado) }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot
    @slot('footer')
        @include('@.partials.modifiers-block', [
            'model' => $consolidado,
        ])
    @endslot
@endcomponent
<br>

<div class="text-end">
    @component('@.partials.confirm-delete.bundle', [
        'route' => route('consolidados.destroy', $consolidado),
        'text' => 'Eliminar consolidado',
    ])
        @slot('content')
        <p class="lead">¿Deseas eliminar consolidado <b>{{ $consolidado->numero }}</b>?</p>
        <p class="text-muted small">Contiene {{ $consolidado->entradas->count() }} entradas</p>
        @endslot
    @endcomponent
</div>
<br>

@endsection
