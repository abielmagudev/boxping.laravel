@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">
        <span>Nueva entrada</span>
    </div> 
    <div class="card-body">
        <form action="{{ route('entradas.store') }}" method="post" autocomplete="off">
            @include('entradas.includes.save')
            <br>
            <button class="btn btn-success" type="submit">Agregar entrada</button>
            <a href="{{ $url_previous }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection