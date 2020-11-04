@component('components.modal-confirm-delete-bundle')
    @slot('text', 'Eliminar consolidado')
    @slot('route', route('consolidados.destroy', $consolidado))

    @slot('content')
    <p class="lead text-center">Quieres eliminar el número de consolidado <br><b>{{ $consolidado->numero }}</b> ?</p>
    
    @if( $consolidado->entradas->count() )
    <div class="bg-light mx-3 py-4 px-4">
        <p>
            <small>Este consolidado contiene {{ $consolidado->entradas->count() }} entrada(s)</small>
        </p>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="checkbox-eliminar-entradas-si" name="eliminar_entradas" value="si" checked>
            <label class="form-check-label" for="checkbox-eliminar-entradas-si">Eliminar las entradas tambien.</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="checkbox-eliminar-entradas-no" name="eliminar_entradas" value="no">
            <label class="form-check-label" for="checkbox-eliminar-entradas-no">Conservar las entradas con cliente.</label>
        </div>
    </div>
    @endif

    @endslot
@endcomponent
