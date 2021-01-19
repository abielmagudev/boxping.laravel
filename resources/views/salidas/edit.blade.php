@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <span>Editar salida</span>
    </div>
    <div class="card-body">
        <form action="{{ route('salidas.update', $salida) }}" method="post" autocomplete="off">
            @method('put')
            <div class="row">
                <div class="col-sm">
                    <p class="">Entrada</p> 
                </div>
                <div class="col-sm col-sm-10">
                    <div class="form-group">
                        <label class="small">Número</label>
                        <div class="form-control border-0">{{ $salida->entrada->numero }}</div>
                    </div>
                </div>
            </div>
            @include('salidas._save')
            <div class="text-right">
                <button class="btn btn-warning" type="submit">Actualizar salida</button>
                <a href="{{ route('salidas.index') }}" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </form>
    </div>
</div>
@include('salidas._eliminar')
@endsection
