@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Editar vehículo',    
])
    <form action="{{ route('vehiculos.update', $vehiculo) }}" method="post" autocomplete="off">
        @method('put')
        @include('vehiculos._save')
        <br>
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit">Actualizar vehículo</button>
            <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
            @include('@.partials.modal-confirm-delete.trigger', ['only' => 'text'])
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $vehiculo])

@include('@.partials.modal-confirm-delete.modal', [
    'route' => route('vehiculos.destroy', $vehiculo),
    'category' => 'vehículo',
    'name' => $vehiculo->nombre
])

@endsection
