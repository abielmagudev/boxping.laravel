@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'title' => 'Nueva guia de impresión',    
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('guias_impresion.store') }}" method="post" autocomplete="off">
        @include('guias_impresion._save')
        <br>

        <button class="btn btn-success" type="submit">
            <span>Guardar</span>
            <span class="d-none d-md-inline-block">guía de impresión</span>
        </button>
        <a href="{{ route('guias_impresion.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent

@endsection
