@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'title' => 'Editar remitente'
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('remitentes.update', $remitente) }}" method="post" autocomplete="off">
        @method('patch')
        @include('remitentes._save')
        <button type="submit" class="btn btn-warning">Actualizar remitente</button>
        <a href="{{ $goback }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot

    @slot('footer')
        @include('@.partials.modifiers-block', [
            'model' => $remitente
        ])
    @endslot
@endcomponent
<br>

<div class="text-end">
    @component('@.partials.confirm-delete.bundle', [
        'route' => route('remitentes.destroy', $remitente),
        'text' => 'Eliminar remitente'
    ])
        @slot('content')
        <p class="lead">¿Deseas eliminar remitente <b>{{ $remitente->nombre }}</b>?</p>
        @endslot
    @endcomponent
</div>
<br>

@endsection
