<div class="tab-pane fade" id="remitente" role="tabpanel" aria-labelledby="remitente-tab">

    @if( is_object($entrada->remitente) )
    <div class="row">
        <div class="col-sm col-sm-3">
            <small class="text-muted">Nombre</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->remitente->nombre }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3">
            <small class="text-muted">Dirección</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->remitente->direccion }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3">
            <small class="text-muted">Código postal</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->remitente->codigo_postal }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3">
            <small class="text-muted">Localidad</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->remitente->localidad }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3">
            <small class="text-muted">Teléfono</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->remitente->telefono }}</span>
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
        <button data-toggle="modal" data-target="#searchRemitentes" type="button" class="btn btn-primary btn-sm">Cambiar remitente</button>
        <a href="{{ route('remitentes.edit', ['remitente' => $entrada->remitente->id, 'entrada' => $entrada->id]) }}" class="btn btn-warning btn-sm">Editar remitente</a>
    </div>

    @else
    <p class="text-center">
        <button data-toggle="modal" data-target="#searchRemitentes" type="button" class="btn btn-primary btn-sm">Agregar remitente</button>
    </p>

    @endif

    @include('entradas.modals.search-remitentes')
</div>