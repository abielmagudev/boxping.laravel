<div class="float-right">
@component('components.modal-confirm-delete', [
    'action' => route('medidas.destroy', $medida),
    'button_text'  => 'Si, eliminar medida',
    'trigger_text' => 'Eliminar medida',
])
    @slot('warning')
    <p>Deseas eliminar esta medida?</p>
    @endslot
@endcomponent
</div>