<div class="float-right">
    @component('components.modal-confirm-delete-bundle')
        @slot('text', 'Eliminar etapa')
        @slot('route', route('etapas.destroy', $etapa))
        @slot('content')
        <p class="lead text-center m-0">Deseas eliminar la etapa  <b>{{ $etapa->nombre }}</b>?</p>
        @endslot
    @endcomponent
</div>
