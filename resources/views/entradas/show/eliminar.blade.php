@component('components.confirm-delete-bundle')
    @slot('text', 'Eliminar entrada')
    @slot('route', route('entradas.destroy', $entrada))
    @slot('content')
    <p class="text-center">Deseas eliminar la entrada <br><b>{{ $entrada->numero }}</b>?</p>
    @endslot
@endcomponent
