<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span class="align-middle">Consolidado</span>
                <?php $status = $consolidado->abierto ? 'abierto' : 'cerrado' ?>
                @component('components.tooltip-shape')
                    @slot('title', ucfirst($status))
                    @slot('color', $config_consolidados['colores'][$status])
                @endcomponent
            </div>
            <div>
                <a href="{{ route('consolidados.edit', $consolidado->id) }}" class="btn btn-warning btn-sm">
                    @component('components.symbol')
                        @slot('symbol', 'pencil-right')
                    @endcomponent
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <p>
            <span>{{ $consolidado->numero }}</span>
            <br>
            <small class="text-muted">Número</small>
        </p>
        <p>
            <span>{{ $consolidado->tarimas }}</span>
            <br>
            <small class="text-muted">Tarimas</small>
        </p>
        @if( $consolidado->notas )
        <p>
            <span>{{ $consolidado->notas }}</span>
            <br>
            <small class="text-muted">Notas</small>
        </p>
        @endif
        <p>
            <span>{{ $consolidado->cliente->nombre }}</span>
            <br>
            <small class="text-muted">Cliente</small>
        </p>
        <p>
            <span>{{ $consolidado->creator->name }}</span>
            <br>
            <span>{{ $consolidado->created_at }}</span>
            <br>
            <small class="text-muted">Creado</small>
        </p>
        <p>
            <span>{{ $consolidado->updater->name }}</span>
            <br>
            <span>{{ $consolidado->updated_at }}</span>
            <br>
            <small class="text-muted">Actualizado</small>
        </p>
    </div>
</div>
