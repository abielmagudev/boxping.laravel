<br>
<div class="float-right">
@component('components.modal-confirm-delete-bundle')
    @slot('route', route('vehiculos.destroy', $vehiculo))
    @slot('text', 'Eliminar vehículo')
    @slot('content')
    <p class="lead text-center m-0">Deseas eliminar vehículo <b>{{ $vehiculo->alias }}</b> ?</p>
    @endslot
@endcomponent
</div>
<br>
