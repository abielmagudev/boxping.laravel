@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <span>Nuevo destinatario</span>
    </div>
    <div class="card-body">
        <?php $route = $entrada_id ? route('destinatarios.store', ['entrada' => $entrada_id]) : route('destinatarios.store') ?>
        <form action="{{ $route }}" method="post" autocomplete="off">
            @include('destinatarios._save')
            <button type="submit" class="btn btn-success">Guardar destinatario</button>
            <a href="{{ $returning }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
