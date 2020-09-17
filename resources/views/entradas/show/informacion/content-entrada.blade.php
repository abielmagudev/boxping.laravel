<div class="tab-pane fade show active" id="entrada" role="tabpanel" aria-labelledby="entrada-tab">
    <div class="row">
        <div class="col-sm col-sm-3">
            <small class="text-muted">Número</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->numero }}</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3">
            <small class="text-muted">Consolidado</small>
        </div>
        <div class="col-sm">
            @if( is_object($entrada->consolidado) )
            <a href="{{ route('consolidados.show', $entrada->consolidado) }}">{{ $entrada->consolidado->numero }}</a>
            @else
            <span>Sin consolidar</span>
            @endif
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3">
            <small class="text-muted">Cliente</small>
        </div>
        <div class="col-sm">
            <span>{{ $entrada->cliente->nombre }} ({{ $entrada->cliente->alias }})</span>
        </div>

        <div class="w-100 mb-2"></div>

        <div class="col-sm col-sm-3">
            <small class="text-muted">Creado</small>
        </div>
        <div class="col-sm">
            <p class="m-0">{{ $entrada->creator->name }}</p>
            <p class="m-0">{{ $entrada->created_at }}</p>
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
        <a href="{{ route('entradas.edit', [$entrada, 'formulario' => 'entrada']) }}" class="btn btn-warning btn-sm">
            <span>Editar entrada</span>
        </a>
    </div>
</div>
