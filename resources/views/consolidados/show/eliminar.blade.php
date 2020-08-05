@component('components.modal-confirm-delete', [
    'action' => route('consolidados.destroy', $consolidado),
    'button_text'  => 'Si, eliminar consolidado',
    'trigger_text' => 'Eliminar consolidado',
])
    @slot('warning')
    <p>Deseas eliminar consolidado <b>{{ $consolidado->numero }}</b>?</p>
    @endslot
@endcomponent