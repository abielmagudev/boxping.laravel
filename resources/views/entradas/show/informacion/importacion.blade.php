<div class="tab-pane fade" id="importacion" role="tabpanel" aria-labelledby="importacion-tab">
    @if( is_object($entrada->vehiculo) )
    <p>
        <small class="d-block text-muted">Vehículo</small>
        <span>{{ is_object($entrada->vehiculo) ? $entrada->vehiculo->alias : 'Vehículo desconocido' }}</span>
    </p>

    <p>
        <small class="d-block text-muted">Conductor</small>
        <span>{{ is_object($entrada->conductor) ? $entrada->conductor->nombre : 'Conductor desconocido' }}</span>
    </p>

    <p>
        <small class="d-block text-muted">Número de cruce</small>
        <span>{{ $entrada->numero_cruce }}</span>
    </p>

    <p>
        <small class="d-block text-muted">Horario</small>
        <span>{{ $entrada->importado_horario }}</span>
    </p>
    <br>

    <p class="text-end">
        <a href="{{ route('entradas.edit', [$entrada, 'formulario' => 'importacion']) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Editar importación">
            <span>Editar importación</span>
        </a>
    </p>

    @else
    <p class="text-center mt-5">
        <a href="{{ route('entradas.edit', [$entrada, 'formulario' => 'importacion']) }}" class="btn btn-primary btn-lg">Agregar importación</a>
    </p>

    @endif
</div>
