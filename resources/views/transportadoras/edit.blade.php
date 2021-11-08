@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar transportadora'    
])
    <form action="{{ route('transportadoras.update', $transportadora) }}" method="post" autocomplete="off" id="form-transport-update">
        @method('put')
        @include('transportadoras._save')
        <br>
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button type="submit" class="btn btn-warning mb-3 mb-md-0" form="form-transport-update">Actualizar transportadora</button>
            <a href="{{ route('transportadoras.index') }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
            @include('@.partials.modal-confirm-delete.trigger', ['only' => 'text'])
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $transportadora])

@include('@.partials.modal-confirm-delete.modal', [
    'route' => route('transportadoras.destroy', $transportadora),
    'name' => $transportadora->nombre,
    'category' => 'transportadora',
])

@endsection
