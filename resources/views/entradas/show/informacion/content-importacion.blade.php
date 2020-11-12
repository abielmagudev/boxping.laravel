<div class="tab-pane fade" id="importacion" role="tabpanel" aria-labelledby="importacion-tab">
    @if( is_object($entrada->vehiculo) )
    <p class="text-right">
        <a href="{{ route('entradas.edit', [$entrada, 'formulario' => 'importacion']) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Editar importación">
            <b>e</b>
        </a>
    </p>
    <div class="row">
        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Vehículo</small>
        </div>
        <div class="col-sm">
            <span>{{ is_object($entrada->vehiculo) ? $entrada->vehiculo->alias : '' }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Conductor</small>
        </div>
        <div class="col-sm">
            <span>{{ is_object($entrada->conductor) ? $entrada->conductor->nombre : '' }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Número de cruce</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->numero_cruce }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Horario</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->importado_horario }}</span>
        </div>
    </div>

    @else
    <br>
    <p class="text-center">
        <a href="{{ route('entradas.edit', [$entrada, 'formulario' => 'importacion']) }}" class="btn btn-primary btn-sm">Agregar importación</a>
    </p>

    @endif
</div>
