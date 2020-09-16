<div class="tab-pane fade" id="reempaque" role="tabpanel" aria-labelledby="reempaque-tab">
    @if( is_object($entrada->codigor) )
    <div class="row">
        <div class="col-sm col-sm-3">
            <small class="text-muted">Código R</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->codigor->nombre }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3">
            <small class="text-muted">Descripción</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->codigor->descripcion }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3">
            <small class="text-muted">Horario</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->reempacado_horario }}</span>
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
        <a href="{{ route('entradas.edit', [$entrada, 'formulario' => 'reempaque']) }}" class="btn btn-warning btn-sm">
            <span>Editar reempaque</span>
        </a>
    </div>
    @else

    <p class="text-center">
        <a href="{{ route('entradas.edit', [$entrada, 'formulario' => 'reempaque']) }}" class="btn btn-primary btn-sm">Agregar reempaque</a>
    </p>
    @endif
</div>