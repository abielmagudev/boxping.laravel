@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">Editar código</div>
        <div class="card-body">
            <form action="{{ route('codigosr.update', $codigor) }}" method="post" autocomplete="off">
                @method('patch')
                @include('codigosr._save')
                <br>
                <button class="btn btn-warning" type="submit">Actualizar código</button>
                <a href="{{ route('codigosr.show', $codigor) }}" class="btn btn-secondary">Regresar</a>
            </form>
        </div>
    </div>
@endsection
