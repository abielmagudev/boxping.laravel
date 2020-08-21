<div class="tab-pane fade" id="cruce" role="tabpanel" aria-labelledby="cruce-tab">
    @if( is_object($entrada->vehiculo) )
    <p>
        <small class="d-block text-muted">Vehículo</small>
        <span>{{ is_object($entrada->vehiculo) ? $entrada->vehiculo->nombre : '' }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Conductor</small>
        <span>{{ is_object($entrada->conductor) ? $entrada->conductor->nombre : '' }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Vuelta</small>
        <span>{{ $entrada->vuelta }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Horario</small>
        <span>{{ $entrada->cruce_horario }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Actualizado</small>
        <span>{{ $entrada->updater->name }}</span>
        <br>
        <span>{{ $entrada->updated_at }}</span>
    </p>
    <br>
    
    <div class="text-right">
        <a href="{{ route('entradas.edit', [$entrada, 'form' => 'cruce']) }}" class="btn btn-warning btn-sm">
            <span>Editar cruce</span>
        </a>
    </div>
    @else

    <br>
    <p class="text-center">
        <a href="{{ route('entradas.edit', [$entrada, 'form' => 'cruce']) }}" class="btn btn-outline-success">Agregar cruce</a>
    </p>
    @endif
</div>
