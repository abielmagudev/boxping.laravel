<div class="tab-pane fade" id="remitente" role="tabpanel" aria-labelledby="remitente-tab">

    @if( is_object($entrada->remitente) )
    @component('@.bootstrap.table')
        @slot('tbody')
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
            <td>{{ $entrada->remitente->postal }}</td>
        </tr>
        <tr>
            <td class="text-muted small border-0">Localidad</td>
            <td class="border-0">{{ $entrada->remitente->localidad }}</td>
        </tr>
        @endslot
    @endcomponent
    <br>

    <div class="text-end">
        @include('@.bootstrap.modal-trigger', [
            'classes' => 'btn btn-primary btn-sm',
            'modal_id' => 'modalSearchToChangeRemitente',
            'text' => 'Cambiar remitente',
        ])
        <a href="{{ route('remitentes.edit', ['remitente' => $entrada->remitente->id, 'entrada' => $entrada->id]) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Editar remitente">
            <span>Editar remitente</span>
        </a>
    </div>

    @else
    <div class="text-center mt-5">
        @include('@.bootstrap.modal-trigger', [
            'classes' => 'btn btn-primary',
            'modal_id' => 'modalSearchToChangeRemitente',
            'text' => 'Agregar remitente',
        ])
    </div>

    @endif

    @include('entradas.show.trayectoria.modal-change-remitente')
    
</div>
