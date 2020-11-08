<div class="tab-pane fade" id="cruce" role="tabpanel" aria-labelledby="cruce-tab">
    @if( is_object($entrada->vehiculo) )
    <p class="text-right">
        <a href="{{ route('entradas.edit', [$entrada, 'formulario' => 'cruce']) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Editar cruce">
            <b>e</b>
        </a>
    </p>

    <div class="row">
        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Vehículo</small>
        </div>
        <div class="col-sm">
            <span>{{ is_object($entrada->vehiculo) ? $entrada->vehiculo->nombre : '' }}</span>
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
            <small class="text-muted">Vuelta</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->vuelta }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Horario</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->cruce_horario }}</span>
        </div>
    </div>
    @else

    <br>
    <p class="text-center">
        <a href="{{ route('entradas.edit', [$entrada, 'formulario' => 'cruce']) }}" class="btn btn-primary btn-sm">Agregar cruce</a>
    </p>
    @endif
</div>
