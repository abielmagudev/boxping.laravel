<br>
<div class="float-right">
@component('components.modal-confirm-delete-bundle')
    @slot('route', route('incidentes.destroy', $incidente))
    @slot('text', 'Eliminar incidente')
    @slot('content')
    <p class="lead text-center m-0">Deseas eliminar incidente <b>{{ $incidente->titulo }}</b> ?</p>
    @endslot
@endcomponent
</div>
<br>
