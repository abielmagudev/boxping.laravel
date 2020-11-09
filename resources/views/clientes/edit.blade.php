@extends('app')
@section('content')
<div class="card">
    <div class="card-header">Editar cliente</div>
    <div class="card-body">
        <form action="{{ route('clientes.update', $cliente) }}" method="post" autocomplete="off">
            @method('put')
            @include('clientes._save')
            <br>
            <button class="btn btn-warning" type="submit">Actualizar cliente</button>
            <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection
