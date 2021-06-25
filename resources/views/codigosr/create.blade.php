@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'title' => 'Nuevo código de reempacado',
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('codigosr.store') }}" method="post" autocomplete="off">
        @include('codigosr._save')
        <br>
        <button class="btn btn-success" type="submit">Guardar código</button>
        <a href="{{ route('codigosr.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent
<br>

@endsection
