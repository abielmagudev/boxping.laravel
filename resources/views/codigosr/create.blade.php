@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">Nuevo código</div>
        <div class="card-body">
            <form action="{{ route('codigosr.store') }}" method="post" autocomplete="off">
                @include('codigosr._save')
                <br>
                <button class="btn btn-success" type="submit">Guardar código</button>
                <a href="{{ route('codigosr.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
