@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Nuevo código de reempacado',
])
    <form action="{{ route('codigosr.store') }}" method="post" autocomplete="off">
        @include('codigosr._save')
        <br>
        <button class="btn btn-primary" type="submit">Guardar código</button>
        <a href="{{ route('codigosr.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
@endcomponent
<br>

@endsection
