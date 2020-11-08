@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <p class="m-0">Editar {{ $template }}</p>
    </div> 
    <div class="card-body">
        <form action="{{ route('entradas.update', $entrada) }}" method="post" autocomplete="off">
            @csrf
            @method('patch')
            @include('entradas.edit.' . $template)
            <br>
            <button class="btn btn-warning" type="submit" name="actualizar" value="{{ $template }}">Actualizar {{ $template }}</button>
            <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection
