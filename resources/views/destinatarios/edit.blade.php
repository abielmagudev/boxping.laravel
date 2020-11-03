@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
        <span>Editar destinatario</span>
    </div>
    <div class="card-body">
        <form action="{{ route('destinatarios.update', $destinatario) }}" method="post" autocomplete="off">
            @method('patch')
            @include('destinatarios._save')
            <button type="submit" class="btn btn-warning">Actualizar destinatario</button>
            <a href="{{ $returning }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection
