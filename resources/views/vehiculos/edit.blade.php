@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
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
        @include('@.partials.modifiers-block', [
            'model' => $vehiculo,
        ])
    @endslot
@endcomponent
<br>

<div class="text-end">
    @component('@.partials.confirm-delete.bundle', [
        'route' => route('vehiculos.destroy', $vehiculo),
        'text' => 'Eliminar vehículo',
    ])
        @slot('content')
        <p class="lead">¿Deseas eliminar vehículo <b>{{ $vehiculo->nombre }}</b>?</p>
        @endslot
    @endcomponent
</div>
<br>

@endsection
