<br>
<div class="float-right">
@component('components.modal-confirm-delete-bundle')
    @slot('route', route('conductores.destroy', $conductor))
    @slot('text', 'Eliminar conductor')
    @slot('content')
    <p class="lead text-center m-0">Deseas eliminar conductor <b>{{ $conductor->nombre }}</b> ?</p>
    @endslot
@endcomponent
</div>
<br>
