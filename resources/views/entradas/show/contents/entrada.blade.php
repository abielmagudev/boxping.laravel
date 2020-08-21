<div class="tab-pane fade show active" id="entrada" role="tabpanel" aria-labelledby="entrada-tab">
    <p>
        <small class="d-block text-muted">Número</small>
        <span>{{ $entrada->numero }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Consolidado</small>
        <span>{{ is_object($entrada->consolidado) ? $entrada->consolidado->numero : 'Sin consolidar' }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Cliente</small>
        <span>{{ $entrada->cliente->nombre }} ({{ $entrada->cliente->alias }})</span>
    </p>
    <p>
        <small class="d-block text-muted">Actualizado</small>
        <span>{{ $entrada->updater->name }}</span>
        <br>
        <span>{{ $entrada->updated_at }}</span>
    </p>
    <br>

    <div class="text-right">
        <a href="{{ route('entradas.edit', [$entrada, 'form' => 'entrada']) }}" class="btn btn-warning btn-sm">
            <span>Editar entrada</span>
        </a>
    </div>
</div>
