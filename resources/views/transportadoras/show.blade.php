@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <span>Transportadora</span>
    </div>
    <div class="card-body">
        <p>
            <small class="d-block text-muted">Nombre</small>
            <span>{{ $transportadora->nombre }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Sitio web</small>
            <span>{{ $transportadora->web }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Teléfono</small>
            <span>{{ $transportadora->telefono }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Notas</small>
            <span>{{ $transportadora->notas }}</span>
        </p>
        <br>
        <div class="text-right">
            <a href="{{ route('transportadoras.edit', $transportadora) }}" class="btn btn-outline-warning">Editar transportadora</a>
        </div>
    </div>
</div>
@endsection
