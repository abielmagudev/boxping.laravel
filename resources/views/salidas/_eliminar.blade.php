<br>
<div class="float-right">
@component('components.modal-confirm-delete-bundle')
    @slot('route', route('salidas.destroy', $salida))
    @slot('text', 'Eliminar salida')
    @slot('content')
    <p class="lead text-center m-0">Deseas eliminar salida con rastreo <b>{{ $salida->rastreo }}</b> ?</p>
    @endslot
@endcomponent
</div>
<br>
