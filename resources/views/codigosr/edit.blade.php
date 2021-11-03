@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar Código de Reempacado',
])
    <form action="{{ route('codigosr.update', $codigor) }}" method="post" autocomplete="off">
        @method('patch')
        @include('codigosr._save')
        <br>
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit">Actualizar código</button>
            <a href="{{ route('codigosr.index') }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
            @include('@.partials.modal-confirm-delete.trigger', ['only' => 'text'])
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $codigor])

@component('@.partials.modal-confirm-delete.modal', [
    'route' => route('codigosr.destroy', $codigor),
])
    <p>Si eliminas código reempacado "{{ $codigor->nombre }}", no estará disponible para próximos reempaques.</p>
    <p>
        <small>(Las entradas existentes conservarán <br>este código de reempacado)</small>
    </p>
@endcomponent

@endsection
