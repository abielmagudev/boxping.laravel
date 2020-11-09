<br>
<div class="float-right">
    @component('components.modal-confirm-delete-bundle')
        @slot('text', 'Eliminar cliente')
        @slot('route', route('clientes.destroy', $cliente))
        @slot('content')
        <p class="lead text-center m-0">Deseas eliminar cliente <b>{{ $cliente->nombre }} ({{ $cliente->alias }})</b> ?</p>
        @endslot
    @endcomponent
</div>
<br>
