<div class="tab-pane fade show active" id="resumen" role="tabpanel" aria-labelledby="resumen-tab">

    <!-- Informacion -->
    <p>
        <small class="d-block text-muted">Consolidado</small>
        @if( is_object($entrada->consolidado) )
        <a href="{{ route('consolidados.show', $entrada->consolidado) }}" class="link-primary">{{ $entrada->consolidado->numero }}</a>
        
        @else
        <span>Sin consolidar</span>
        
        @endif
    </p>

    <p>
        <small class="d-block text-muted">Cliente</small>
        <span>{{ $entrada->cliente->nombre }} ({{ $entrada->cliente->alias }})</span>
    </p>

    <p>
        <small class="d-block text-muted">Contenido</small>
        <span>{{ $entrada->contenido }}</span>
    </p>

    <p>
        <small class="d-block text-muted">Última actualización</small>
        <span class="d-block">{{ $entrada->updated_at }}</span>
        <span class="d-block">{{ $entrada->updater->name }}</span>
    </p>

    <p>
        <small class="d-block text-muted"></small>
    </p>
    <br>

    <p class="text-end">
        <a href="{{ route('entradas.edit', [$entrada, 'formulario' => 'entrada']) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" title="Editar entrada">
            <span>Editar entrada</span>
        </a>
    </p>
</div>
