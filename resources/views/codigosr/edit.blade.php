@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar código de reempacado',
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

@include('@.partials.modal-confirm-delete.modal', [
    'route' => route('codigosr.destroy', $codigor),
    'category' => 'código de reempacado',
    'name' => $codigor->nombre,
])

@endsection
