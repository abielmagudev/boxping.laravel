<div class="tab-pane fade" id="destinatario" role="tabpanel" aria-labelledby="destinatario-tab">

    @if( is_object($entrada->destinatario) )
    <div class="row">
        <div class="col-sm col-sm-3">
            <small class="text-muted">Nombre</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->destinatario->nombre }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3">
            <small class="text-muted">Dirección</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->destinatario->direccion }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3">
            <small class="text-muted">Código postal</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->destinatario->codigo_postal }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3">
            <small class="text-muted">Localidad</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->destinatario->localidad }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3">
            <small class="text-muted">Teléfono</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->destinatario->telefono }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3">
            <small class="text-muted">Referencias</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->destinatario->referencias }}</span>
        </div>

        <!-- 
        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3">
            <small class="text-muted">Actualizado</small>
        </div>
        <div class="col-sm">
            <p class="m-0">{ $entrada->updater->name }</p>
            <p class="m-0">{ $entrada->updated_at }</p>
        </div> 
        -->
    </div>
    <br>

    <div class="text-right">
        <button data-toggle="modal" data-target="#searchDestinatarios" type="button" class="btn btn-outline-primary btn-sm">Cambiar destinatario</button>
        <a href="{{ route('destinatarios.edit', ['destinatario' => $entrada->destinatario_id, 'entrada' => $entrada->id]) }}" class="btn btn-outline-warning btn-sm">Editar destinatario</a>
    </div>

    @else
    <p class="text-center">
        <button data-toggle="modal" data-target="#searchDestinatarios" type="button" class="btn btn-primary btn-sm">Agregar destinatario</button>
    </p>

    @endif

    @include('entradas.show.modal-search-destinatarios')
</div>
