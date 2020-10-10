@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">
        <span>Editar transportadora</span>
    </div>
    <div class="card-body">
        <form action="{{ route('transportadoras.update', $transportadora) }}" method="post" autocomplete="off">
            @method('put')
            @include('transportadoras._save')
            <button type="submit" class="btn btn-warning">Actualizar transportadora</button>
            <a href="{{ route('transportadoras.index') }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection