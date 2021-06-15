@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => 'Editar conductor'
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
        <form action="{{ route('conductores.update', $conductor) }}" method="post" autocomplete="off">
            @method('put')
            @include('conductores._save')
            <br>
            <button class="btn btn-warning">Actualizar conductor</button>
            <a href="{{ route('conductores.index') }}" class="btn btn-secondary">Regresar</a>
        </form>
    @endslot
    @slot('footer')
        @component('@.partials.block-modifiers', [
            'model' => $conductor
        ])
        @endcomponent
    @endslot
@endcomponent
<br>

@component('@.partials.modal-confirm-delete', [
    'route' => route('conductores.destroy', $conductor),
    'text' => 'Eliminar conductor',
])
    @slot('content')
    <p class="lead">¿Deseas eliminar conductor <b>{{ $conductor->nombre }}</b>?</p>
    @endslot
@endcomponent
<br>

@endsection
