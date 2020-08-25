@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">Editar medidor</div>
    <div class="card-body">
        <form action="{{ route('medidores.update', $medidor) }}" method="post" autocomplete="off">
            @method('put')
            @include('medidores.includes.save')
            <button class="btn btn-warning" type="submit">Actualizar medidor</button>
            <a href="{{ route('medidores.index') }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
<br>

@include('medidores.includes.delete')
@endsection