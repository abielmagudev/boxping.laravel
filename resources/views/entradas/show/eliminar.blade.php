@component('components.modal-confirm-delete-bundle')
    @slot('text', 'Eliminar entrada')
    @slot('route', route('entradas.destroy', $entrada))
    @slot('content')
    <p class="lead text-center m-0">Deseas eliminar la entrada <br><b>{{ $entrada->numero }}</b> ?</p>
    @endslot
@endcomponent
