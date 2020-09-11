@component('components.confirm-delete-bundle')
    @slot('text', 'Eliminar consolidado')
    @slot('route', route('consolidados.destroy', $consolidado))

    @slot('content')
    <p class="lead text-center">Deseas eliminar el consolidado <b>{{ $consolidado->numero }}</b> ?</p>
    
    @if( $consolidado->entradas->count() )
    <div class="d-flex justify-content-center">
        <div class="bg-light rounded py-2 px-3">
            <p class="text-muted small">{{ $consolidado->entradas->count() }} entrada(s)</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="checkbox-entradas-delete-yes" name="eliminar_entradas" value="yes" checked>
                <label class="form-check-label" for="checkbox-entradas-delete-yes">Eliminar las entradas también</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="checkbox-entradas-delete-no" name="eliminar_entradas" value="no">
                <label class="form-check-label" for="checkbox-entradas-delete-no">Conservar las entradas con cliente</label>
            </div>
        </div>
    </div>
    @endif

    @endslot
@endcomponent
