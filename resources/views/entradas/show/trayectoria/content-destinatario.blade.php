<div class="tab-pane fade" id="destinatario" role="tabpanel" aria-labelledby="destinatario-tab">

    @if( is_object($entrada->destinatario) )
    <p class="text-right">
        <button data-toggle="modal" data-target="#searchDestinatarios" type="button" class="btn btn-outline-primary btn-sm">Cambiar destinatario</button>
        <a href="{{ route('destinatarios.edit', ['destinatario' => $entrada->destinatario_id, 'entrada' => $entrada->id]) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Editar destinatario">
            <b>e</b>
        </a>
    </p>
    <div class="row">
        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Nombre</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->destinatario->nombre }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Dirección</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->destinatario->direccion }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Código postal</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->destinatario->codigo_postal }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Localidad</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->destinatario->localidad }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Teléfono</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->destinatario->telefono }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Referencias</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->destinatario->referencias }}</span>
        </div>
    </div>

    @else
    <p class="text-center">
        <button data-toggle="modal" data-target="#searchDestinatarios" type="button" class="btn btn-primary btn-sm">Agregar destinatario</button>
    </p>

    @endif
</div>
