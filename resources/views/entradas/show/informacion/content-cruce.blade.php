<div class="tab-pane fade" id="cruce" role="tabpanel" aria-labelledby="cruce-tab">
    @if( is_object($entrada->vehiculo) )

    <div class="row">
        <div class="col-sm col-sm-3">
            <small class="text-muted">Vehículo</small>
        </div>
        <div class="col-sm">
            <span>{{ is_object($entrada->vehiculo) ? $entrada->vehiculo->nombre : '' }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3">
            <small class="text-muted">Conductor</small>
        </div>
        <div class="col-sm">
            <span>{{ is_object($entrada->conductor) ? $entrada->conductor->nombre : '' }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3">
            <small class="text-muted">Vuelta</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->vuelta }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3">
            <small class="text-muted">Horario</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->cruce_horario }}</span>
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
        <a href="{{ route('entradas.edit', [$entrada, 'formulario' => 'cruce']) }}" class="btn btn-outline-warning btn-sm">
            <span>Editar cruce</span>
        </a>
    </div>
    @else

    <p class="text-center">
        <a href="{{ route('entradas.edit', [$entrada, 'formulario' => 'cruce']) }}" class="btn btn-primary btn-sm">Agregar cruce</a>
    </p>
    @endif
</div>
