@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'title' => 'Nueva etapa'
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('etapas.store') }}" method="post" autocomplete="off">
        @include('etapas._save')
        <button class="btn btn-success" type="submit">Guardar etapa</button>
        <a href="{{ route('etapas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent
<br>

@endsection
