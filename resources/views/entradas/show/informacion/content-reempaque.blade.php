<div class="tab-pane fade" id="reempaque" role="tabpanel" aria-labelledby="reempaque-tab">
    @if( is_object($entrada->codigor) )
    <p class="text-right">
        <a href="{{ route('entradas.edit', [$entrada, 'formulario' => 'reempaque']) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Editar reempaque">
            <b>e</b>
        </a>
    </p>
    
    <div class="row">
        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Código R</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->codigor->nombre }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Descripción</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->codigor->descripcion }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Reempacador</small>
        </div>
        <div class="col-sm">
            <p class="m-0">{{ $entrada->reempacador->nombre }}</p>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3 text-left text-md-right">
            <small class="text-muted">Horario</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->reempacado_horario }}</span>
        </div>
    </div>
    @else

    <br>
    <p class="text-center">
        <a href="{{ route('entradas.edit', [$entrada, 'formulario' => 'reempaque']) }}" class="btn btn-primary btn-sm">Agregar reempaque</a>
    </p>
    @endif
</div>