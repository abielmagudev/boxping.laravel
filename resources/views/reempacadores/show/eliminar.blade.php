<br>
<div class="float-right">
    @component('components.modal-confirm-delete-bundle')
        @slot('text', 'Eliminar reempacador')
        @slot('route', route('reempacadores.destroy', $reempacador))
        @slot('content')
        <p class="text-center lead m-0">
            Deseas eliminar reempacador <b>{{ $reempacador->nombre }}</b>?
        </p>
        @endslot
    @endcomponent
</div>
<br>
