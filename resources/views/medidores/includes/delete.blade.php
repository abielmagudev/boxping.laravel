<div class="float-right">
@component('components.modal-confirm-delete')
    @slot('action', route('medidores.destroy', $medidor))
    @slot('button_text', 'Si, eliminar medidor')
    @slot('trigger_text', 'Eliminar medidor')
    @slot('warning')
    <p>Deseas eliminar medidor <b>{{ $medidor->nombre }}</b>?</p>
    @endslot
@endcomponent
</div>