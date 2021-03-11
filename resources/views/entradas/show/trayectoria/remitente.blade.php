<div class="tab-pane fade" id="remitente" role="tabpanel" aria-labelledby="remitente-tab">

    @if( is_object($entrada->remitente) )
    <table class="table align-middle">
        <tbody>
            <tr>
                <td class="text-muted small">Nombre</td>
                <td>{{ $entrada->remitente->nombre }}</td>
            </tr>
            <tr>
                <td class="text-muted small">Teléfono</td>
                <td>{{ $entrada->remitente->telefono }}</td>
            </tr>
            <tr>
                <td class="text-muted small">Dirección</td>
                <td>{{ $entrada->remitente->direccion }}</td>
            </tr>
            <tr>
                <td class="text-muted small">Postal</td>
                <td>{{ $entrada->remitente->codigo_postal }}</td>
            </tr>
            <tr>
                <td class="text-muted small">Localidad</td>
                <td>{{ $entrada->remitente->localidad }}</td>
            </tr>
        </tbody>
    </table>
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
