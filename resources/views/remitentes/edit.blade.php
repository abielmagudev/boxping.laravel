@extends('app')
@section('content')

@component('@.bootstrap.header', [
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
        @component('@.partials.modifiers', [
            'model' => $remitente
        ])
        @endcomponent
    @endslot
@endcomponent
<br>

@component('@.partials.modal-confirm-delete', [
    'route' => route('remitentes.destroy', $remitente),
    'text' => 'Eliminar remitente'
])
    @slot('content')
    <p class="lead">¿Deseas eliminar remitente <b>{{ $remitente->nombre }}</b>?</p>
    @endslot
@endcomponent
<br>

@endsection
