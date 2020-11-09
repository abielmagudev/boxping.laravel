@extends('app')
@section('content')
<div class="card">
    <div class="card-header">Nuevo cliente</div>
    <div class="card-body">
        <form action="{{ route('clientes.store') }}" method="post" autocomplete="off">
            @include('clientes._save')
            <br>
            <button class="btn btn-success" type="submit">Guardar cliente</button>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
