@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => 'Editar incidente',
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('incidentes.update', $incidente) }}" method="post" autocomplete="off">
        @method('put')
        @include('incidentes._save')
        <br>
        <button class="btn btn-warning" type="submit">Actualizar incidente</button>
        <a href="{{ route('incidentes.index') }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot

    @slot('footer')
    @component('@.partials.modifiers')
        @slot('model', $incidente)
    @endcomponent
    @endslot
@endcomponent
<br>

@component('@.partials.modal-confirm-delete', [
        'route' => route('incidentes.destroy', $incidente),
        'text' => 'Eliminar incidente',
    ])
    @slot('content')
    <p class="lead">¿Deseas eliminar incidente <b>{{ $incidente->titulo }}</b>?</p>
    @endslot
@endcomponent
<br>

@endsection
