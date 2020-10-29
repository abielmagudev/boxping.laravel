@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">
        <span>Nuevo remitente</span>
    </div>
    <div class="card-body">
        <?php $route = $entrada_id ? route('remitentes.store', ['entrada' => $entrada_id]) : route('remitentes.store') ?>
        <form action="{{ $route }}" method="post" autocomplete="off">
            @include('remitentes._save')
            <button type="submit" class="btn btn-success">Guardar remitente</button>
            <a href="{{ $returning }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
