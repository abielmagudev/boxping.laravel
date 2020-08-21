<div class="tab-pane fade" id="reempaque" role="tabpanel" aria-labelledby="reempaque-tab">
    @if( is_object($entrada->codigor) )
    <p>
        <small class="d-block text-muted">Código de reempacado</small>
        @if( is_object($entrada->codigor) )
        <span>{{ $entrada->codigor->nombre }}</span>
        <br>
        <small>{{ $entrada->codigor->descripcion }}</small>
        @endif
    </p>
    <p>
        <small class="d-block text-muted">Reempacador</small>
        <span>{{ $entrada->reempacador->nombre ?? '' }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Horario</small>
        <span>{{ $entrada->reempacado_horario }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Actualizado</small>
        <span>{{ $entrada->updater->name }}</span>
        <br>
        <span>{{ $entrada->updated_at }}</span>
    </p>
    <br>

    <div class="text-right">
        <a href="{{ route('entradas.edit', [$entrada, 'form' => 'reempaque']) }}" class="btn btn-warning btn-sm">
            <span>Editar reempaque</span>
        </a>
    </div>
    @else

    <br>
    <p class="text-center">
        <a href="{{ route('entradas.edit', [$entrada, 'form' => 'reempaque']) }}" class="btn btn-outline-success">Agregar reempaque</a>
    </p>
    @endif
</div>