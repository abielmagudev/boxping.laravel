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

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3">
            <small class="text-muted">Verificación</small>
        </div>
        <div class="col-sm">
            @if( is_object($entrada->destinatario->verificador) )
            <p class="m-0">Si</p>
            <p class="m-0">{{ $entrada->destinatario->verificador->name }}</p>
            <p class="m-0">{{ $entrada->destinatario->verificado_at }}</p>
            
            @else
            <span>No</span>

            @endif
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3">
            <small class="text-muted">Actualizado</small>
        </div>
        <div class="col-sm">
            <p class="m-0">{{ $entrada->updater->name }}</p>
            <p class="m-0">{{ $entrada->updated_at }}</p>
        </div>
    </div>
    <br>

    <div class="text-right">
        <a href="{{ route('destinatarios.edit', $entrada->destinatario) }}" class="btn btn-warning btn-sm">Editar destinatario</a>
    </div>

    @else
    <p class="text-center">
        <a href="{{ route('destinatarios.create', ['entrada' => $entrada]) }}" class="btn btn-primary">Agregar destinatario</a>
    </p>

    @endif
</div>