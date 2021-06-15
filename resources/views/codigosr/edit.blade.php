@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => 'Editar código de reempacado',
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('codigosr.update', $codigor) }}" method="post" autocomplete="off">
        @method('patch')
        @include('codigosr._save')
        <br>
        <button class="btn btn-warning" type="submit">Actualizar código</button>
        <a href="{{ route('codigosr.index') }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot

    @slot('footer')
    @component('@.partials.block-modifiers', [
        'model' => $codigor
    ])
    @endcomponent
    @endslot
@endcomponent
<br>

@component('@.partials.modal-confirm-delete', [
    'route' => route('codigosr.destroy', $codigor),
    'text' => 'Eliminar código de reempacado'
])
    @slot('content')
    <p class="lead">¿Deseas eliminar código de reempacado <b>{{ $codigor->nombre }}</b>?</p>
    @endslot
@endcomponent 
<br>

@endsection
