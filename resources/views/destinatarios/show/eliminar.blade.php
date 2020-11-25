<br>
<div class="float-right">
@component('components.modal-confirm-delete-bundle')
    @slot('route', route('destinatarios.destroy', $destinatario))
    @slot('text', 'Eliminar destinatario')
    @slot('content')
    <p class="lead text-center m-0">Deseas eliminar destinatario <b>{{ $destinatario->nombre }}</b>?</p>
    @endslot
@endcomponent
</div>
<br>
