<div class="tab-pane fade" id="reempaque" role="tabpanel" aria-labelledby="reempaque-tab">
    
    @if( is_object($entrada->codigor) )   
    <p>
        <small class="d-block text-muted">Código de reempacado</small>
        <span>{{ $entrada->codigor->nombre }}</span>
    </p> 

    <p>
        <small class="d-block text-muted">Descripción</small>
        <span>{{ $entrada->codigor->descripcion }}</span>
    </p> 

    <p>
        <small class="d-block text-muted">Reempacador</small>
        <span>{{ $entrada->reempacador->nombre }}</span>
    </p> 

    <p>
        <small class="d-block text-muted">Horario</small>
        <span>{{ $entrada->reempacado_horario }}</span>
    </p> 
    <br>

    <p class="text-end">
        <a href="{{ route('entradas.edit', [$entrada, 'formulario' => 'reempaque']) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Editar reempaque">
            <span>Editar reempaque</span>
        </a>
    </p>

    @else
    <p class="text-center mt-5">
        <a href="{{ route('entradas.edit', [$entrada, 'formulario' => 'reempaque']) }}" class="btn btn-primary btn-lg">Agregar reempaque</a>
    </p>

    @endif
</div>