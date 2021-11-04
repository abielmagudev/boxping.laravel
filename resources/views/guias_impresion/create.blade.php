@extends('app')
@section('content')
    
@component('@.bootstrap.card', [
    'title' => 'Nueva guia de impresión',    
])
    <form action="{{ route('guias_impresion.store') }}" method="post" autocomplete="off">
        @include('guias_impresion._save')
        <br>
        <button class="btn btn-primary" type="submit">Guardar guía de impresión</button>
        <a href="{{ route('guias_impresion.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
@endcomponent

@endsection
