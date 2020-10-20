@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">
        <span>Nueva observación</span>
    </div>
    <div class="card-body">
        <form action="{{ route('observaciones.store') }}" method="post" autocomplete="off">
            @include('observaciones._save')

            <br>
            <button type="submit" class="btn btn-success">Guardar observación</button>
            <a href="{{ route('observaciones.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
