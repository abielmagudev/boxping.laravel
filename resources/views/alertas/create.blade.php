@extends('app')
@section('content')

@component('@.bootstrap.card')
    @slot('title', 'Nueva alerta')
    <form action="{{ route('alertas.store') }}" method="post" autocomplete="off">
        @include('alertas._save')
        <br>
        <button type="submit" class="btn btn-primary">Guardar alerta</button>
        <a href="{{ route('alertas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
@endcomponent
<br>

@endsection
