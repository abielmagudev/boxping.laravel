@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <span>Editar alerta</span>
    </div>
    <div class="card-body">
        <form action="{{ route('alertas.update', $alerta) }}" method="post" autocomplete="off">
            @method('put')
            @include('alertas._save')

            <br>
            <button type="submit" class="btn btn-warning">Actualizar alerta</button>
            <a href="{{ route('alertas.index') }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
<br>
<div class="float-right">
    @component('components.modal-confirm-delete-bundle')
        @slot('text', 'Eliminar alerta')
        @slot('route', route('alertas.destroy', $alerta))
        @slot('content')
        <p class="lead text-center m-0">Deseas eliminar la alerta <b>{{ $alerta->nombre }}</b>?</p>
        @endslot
    @endcomponent
</div>
@endsection
