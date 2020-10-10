@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">
        <span>Nueva transportadora</span>
    </div>
    <div class="card-body">
        <form action="{{ route('transportadoras.store') }}" method="post" autocomplete="off">
            @include('transportadoras._save')
            <button type="submit" class="btn btn-success">Guardar transportadora</button>
            <a href="{{ route('transportadoras.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection