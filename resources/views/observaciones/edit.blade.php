@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">
        <span>Editar observación</span>
    </div>
    <div class="card-body">
        <form action="{{ route('observaciones.update', $observacion) }}" method="post" autocomplete="off">
            @method('put')
            @include('observaciones._save')

            <br>
            <button type="submit" class="btn btn-warning">Actualizar observación</button>
            <a href="{{ route('observaciones.index') }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
<br>

<div class="float-right">
    @component('components.confirm-delete-bundle')
        @slot('text', 'Eliminar observación')
        @slot('route', route('observaciones.destroy', $observacion))
        @slot('content')
        <p class="text-center">Deseas eliminar observación <b>{{ $observacion->nombre }}</b>?</p>
        @endslot
    @endcomponent
</div>
@endsection
