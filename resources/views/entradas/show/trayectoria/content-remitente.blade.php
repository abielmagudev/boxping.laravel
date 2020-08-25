<div class="tab-pane fade" id="remitente" role="tabpanel" aria-labelledby="remitente-tab">
    @if( is_object($entrada->remitente) )
    <div class="row">
        <div class="col-sm col-sm-3">
            <small class="text-muted">Nombre</small>
        </div>
        <div class="col-sm">
            <p class="m-0">{{ $entrada->remitente->nombre }}</p>
        </div>
    </div>

    <div class="w-100 mb-2"></div>

    <div class="row">
        <div class="col-sm col-sm-3">
            <small class="text-muted">Dirección</small>
        </div>
        <div class="col-sm">
            <p class="m-0">{{ $entrada->remitente->direccion }}</p>
        </div>
    </div>

    <div class="w-100 mb-2"></div>

    <div class="row">
        <div class="col-sm col-sm-3">
            <small class="text-muted">Código postal</small>
        </div>
        <div class="col-sm">
            <p class="m-0">{{ $entrada->remitente->codigo_postal }}</p>
        </div>
    </div>

    <div class="w-100 mb-2"></div>

    <div class="row">
        <div class="col-sm col-sm-3">
            <small class="text-muted">Localidad</small>
        </div>
        <div class="col-sm">
            <p class="m-0">{{ $entrada->remitente->localidad }}</p>
        </div>
    </div>

    <div class="w-100 mb-2"></div>

    <div class="row">
        <div class="col-sm col-sm-3">
            <small class="text-muted">Teléfono</small>
        </div>
        <div class="col-sm">
            <p class="m-0">{{ $entrada->remitente->telefono }}</p>
        </div>
    </div>

    <div class="w-100 mb-2"></div>

    <div class="row">
        <div class="col-sm col-sm-3">
            <small class="text-muted">Actualizado</small>
        </div>
        <div class="col-sm">
            <p class="m-0">{{ $entrada->remitente->updater->name }}</p>
            <p class="m-0">{{ $entrada->remitente->updated_at }}</p>
        </div>
    </div>
    <br>

    <div class="text-right">
        <a href="{{ route('remitentes.edit', $entrada->remitente) }}" class="btn btn-warning btn-sm">Editar remitente</a>
    </div>

    @else
    <p class="text-center">
        <a href="{{ route('remitentes.create', ['entrada' => $entrada->id]) }}" class="btn btn-primary">Agregar remitente</a>
    </p>

    @endif
</div>