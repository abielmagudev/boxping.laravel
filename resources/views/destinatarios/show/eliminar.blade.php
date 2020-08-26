@component('components.modal-confirm-delete', [
    'action' => route('destinatarios.destroy', $destinatario),
    'button_text'  => 'Si, eliminar destinatario',
    'trigger_text' => 'Eliminar destinatario',
])
    @slot('warning')
    <p>Deseas eliminar destinatario <b>{{ $destinatario->nombre }}</b>?</p>
    @endslot
@endcomponent