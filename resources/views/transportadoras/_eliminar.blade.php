<div class="float-right">
    @component('components.modal-confirm-delete-bundle')
        @slot('route', route('transportadoras.destroy', $transportadora))
        @slot('text', 'Eliminar transportadora')
        @slot('content')
        <p class='lead text-center m-0'>Deseas eliminar transportadora <b>{{$transportadora->nombre}}</b>?</p>
        @endslot
    @endcomponent
</div>
