<br>
<div class="float-right">
    @component('components.modal-confirm-delete-bundle')
        @slot('route', route('codigosr.destroy', $codigor))
        @slot('text', 'Eliminar código')
        @slot('content')
        <p class="text-center lead m-0">Deseas eliminar código <b>{{$codigor->nombre}}</b>?</p>
        @endslot
    @endcomponent
</div>
<br>
