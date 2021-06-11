@extends('app')
@section('content')

@component('@.bootstrap.header', [
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
    @component('@.partials.modifiers')
        @slot('entity', $destinatario)
    @endcomponent
    @endslot
@endcomponent
<br>

@component('@.partials.modal-confirm-delete')
    @slot('route', route('destinatarios.destroy', $destinatario))
    @slot('text', 'Eliminar destinatario')
    @slot('content')
    <p class="lead">¿Deseas eliminar destinatario <b>{{ $destinatario->nombre }}</b>?</p>
    @endslot
@endcomponent

@endsection
