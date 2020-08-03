@component('components.modal-confirm-delete')
    @slot('route', route('consolidados.destroy', $consolidado))
    @slot('button', 'Si, eliminar consolidado')
    @slot('content')
    <p>Deseas eliminar consolidado <b>{{ $consolidado->numero }}</b>?</p>
    @endslot
@endcomponent