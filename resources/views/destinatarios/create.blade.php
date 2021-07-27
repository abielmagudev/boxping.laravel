@extends('app')
@section('content')

@component('@.bootstrap.page-header')
    @slot('title', 'Nuevo destinatario')
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('destinatarios.store')  }}" method="post" autocomplete="off">
        @include('destinatarios._save')
        <button type="submit" class="btn btn-success">Guardar destinatario</button>
        <a href="{{ route('destinatarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent
<br>

@endsection
