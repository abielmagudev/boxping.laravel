@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'pretitle' => "Transportadora {$transportadora->nombre}",
    'title' => 'Nueva guia de impresión',    
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('guias.store', $transportadora) }}" method="post" autocomplete="off">
        @include('guias_impresion._save')
        <br>

        <button class="btn btn-success" type="submit">Guardar <span class="d-none d-md-inline-block">guía de impresión</span></button>
        <a href="{{ route('transportadoras.show', $transportadora) }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent

@endsection
