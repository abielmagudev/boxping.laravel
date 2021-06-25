@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'title' => 'Editar destinatario'
])    
@endcomponent
@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('destinatarios.update', $destinatario) }}" method="post" autocomplete="off">
        @method('patch')
        @include('destinatarios._save')
        <button type="submit" class="btn btn-warning">Actualizar destinatario</button>
        <a href="{{ route('destinatarios.show', $destinatario) }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot

    @slot('footer')
        @include('@.partials.modifiers-block', [
            'model' => $destinatario,
        ])
    @endslot
@endcomponent
<br>

<div class="text-end">
    @component('@.partials.confirm-delete.bundle')
        @slot('route', route('destinatarios.destroy', $destinatario))
        @slot('text', 'Eliminar destinatario')
        @slot('content')
        <p class="lead">¿Deseas eliminar destinatario <b>{{ $destinatario->nombre }}</b>?</p>
        @endslot
    @endcomponent
</div>
<br>

@endsection
