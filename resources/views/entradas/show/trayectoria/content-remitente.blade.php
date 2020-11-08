<div class="tab-pane fade" id="remitente" role="tabpanel" aria-labelledby="remitente-tab">

    @if( is_object($entrada->remitente) )
    <p class="text-right">
        <button data-toggle="modal" data-target="#searchRemitentes" type="button" class="btn btn-outline-primary btn-sm">Cambiar remitente</button>
        <a href="{{ route('remitentes.edit', ['remitente' => $entrada->remitente->id, 'entrada' => $entrada->id]) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Editar remitente">
            <b>e</b>
        </a>
    </p>
    <div class="row">
        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Nombre</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->remitente->nombre }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Dirección</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->remitente->direccion }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Código postal</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->remitente->codigo_postal }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Localidad</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->remitente->localidad }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Teléfono</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->remitente->telefono }}</span>
        </div>
    </div>

    @else
    <p class="text-center">
        <button data-toggle="modal" data-target="#searchRemitentes" type="button" class="btn btn-primary btn-sm">Agregar remitente</button>
    </p>

    @endif
</div>
