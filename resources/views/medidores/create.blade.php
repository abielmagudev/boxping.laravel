@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">Nuevo medidor</div>
    <div class="card-body">
        <form action="{{ route('medidores.store') }}" method="post" autocomplete="off">
            @include('medidores.includes.save')
            <button class="btn btn-success" type="submit">Guardar medidor</button>
            <a href="{{ route('medidores.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection