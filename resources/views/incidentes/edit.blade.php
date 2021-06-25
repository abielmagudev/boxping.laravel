@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
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
        @include('@.partials.modifiers-block', [
            'model' => $incidente,
        ])
    @endslot
@endcomponent
<br>

<div class="text-end">
    @component('@.partials.confirm-delete.bundle', [
            'route' => route('incidentes.destroy', $incidente),
            'text' => 'Eliminar incidente',
        ])
        @slot('content')
        <p class="lead">¿Deseas eliminar incidente <b>{{ $incidente->titulo }}</b>?</p>
        @endslot
    @endcomponent
</div>
<br>

@endsection
