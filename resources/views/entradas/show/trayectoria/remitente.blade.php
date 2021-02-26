<div class="tab-pane fade" id="remitente" role="tabpanel" aria-labelledby="remitente-tab">

    @if( is_object($entrada->remitente) )
    <p>
        <small class="d-block text-muted">Nombre</small>
        <span>{{ $entrada->remitente->nombre }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Dirección</small>
        <span>{{ $entrada->remitente->direccion }}</span>
        <span class="d-block">C.P. {{ $entrada->remitente->codigo_postal }}</span>
        <span class="">{{ $entrada->remitente->localidad }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Teléfono</small>
        <span>{{ $entrada->remitente->telefono }}</span>
    </p>
    <br>

    <div class="text-end">
        <button data-bs-toggle="modal" data-bs-target="#modal-search-remitentes" type="button" class="btn btn-outline-primary btn-sm">
            <span>Cambiar remitente</span>
        </button>
        <a href="{{ route('remitentes.edit', ['remitente' => $entrada->remitente->id, 'entrada' => $entrada->id]) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Editar remitente">
            <span>Editar remitente</span>
        </a>
    </div>

    @else
    <p class="text-center mt-5">
        <button type="button" data-bs-toggle="modal" data-bs-target="#modal-search-remitentes" class="btn btn-primary btn-lg">Agregar remitente</button>
    </p>

    @endif
</div>
