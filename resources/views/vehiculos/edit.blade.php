@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => 'Editar vehículo',
])
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('vehiculos.update', $vehiculo) }}" method="post" autocomplete="off">
        @method('put')
        @include('vehiculos._save')
        <br>
        <button class="btn btn-warning" type="submit">Actualizar vehículo</button>
        <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot
    @slot('footer')
        @component('@.partials.block-modifiers', [
            'model' => $vehiculo,
        ])
        @endcomponent
    @endslot
@endcomponent
<br>

@component('@.partials.modal-confirm-delete', [
    'route' => route('vehiculos.destroy', $vehiculo),
    'text' => 'Eliminar vehículo'
])
    @slot('content')
    <p class="lead">¿Deseas eliminar vehículo <b>{{ $vehiculo->alias }}</b>?</p>
    @endslot
@endcomponent
<br>

@endsection
