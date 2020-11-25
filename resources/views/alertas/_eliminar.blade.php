<br>
<div class="float-right">
    @component('components.modal-confirm-delete-bundle')
        @slot('text', 'Eliminar alerta')
        @slot('route', route('alertas.destroy', $alerta))
        @slot('content')
        <p class="lead text-center m-0">Deseas eliminar la alerta <b>{{ $alerta->nombre }}</b>?</p>
        @endslot
    @endcomponent
</div>
<br>
