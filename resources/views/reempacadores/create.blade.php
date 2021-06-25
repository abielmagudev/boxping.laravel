@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'title' => 'Nuevo reempacador',
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('reempacadores.store') }}" method="post" autocomplete="off">
        @include('reempacadores._save')
        <br>
        <button class="btn btn-success" type="submit">Guardar reempacador</button>
        <a href="{{ route('reempacadores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent
<br>

@endsection
