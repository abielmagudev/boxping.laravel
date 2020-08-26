@component('components.modal-confirm-delete', [
    'action' => route('remitentes.destroy', $remitente),
    'button_text'  => 'Si, eliminar remitente',
    'trigger_text' => 'Eliminar remitente',
])
    @slot('warning')
    <p>Deseas eliminar remitente <b>{{ $remitente->nombre }}</b>?</p>
    @endslot
@endcomponent