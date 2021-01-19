@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <span>Crear salida</span>
    </div>
    <div class="card-body">
        <form action="{{ route('salidas.store') }}" method="post" autocomplete="off">
            @include('salidas._save')
            <input type="hidden" name="entrada" value="{{ $entrada }}" />
            <div class="text-right">
                <button class="btn btn-success" type="submit">Guardar salida</button>
                <a href="{{ route('salidas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
