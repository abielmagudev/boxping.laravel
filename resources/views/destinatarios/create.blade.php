@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Nuevo destinatario',
])
    <form action="{{ route('destinatarios.store')  }}" method="post" autocomplete="off">
        @include('destinatarios._save')
        <button type="submit" class="btn btn-primary">Guardar destinatario</button>
        <a href="{{ route('destinatarios.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
@endcomponent
<br>

@endsection
