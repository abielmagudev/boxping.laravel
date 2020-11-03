@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <span>Nueva etapa</span>
    </div>
    <div class="card-body">
        <form action="{{ route('etapas.store') }}" method="post" autocomplete="off">
            @include('etapas._save')
            <button class="btn btn-success" type="submit">Guardar etapa</button>
            <a href="{{ route('etapas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
