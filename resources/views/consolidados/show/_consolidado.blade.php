<div class="card">
    @component('components.card-header-with-link', [
        'tooltip' => 'Editar',
        'link' => route('consolidados.edit', $consolidado),
        'color' => 'warning',
    ])
        @slot('title')
        <span class="align-middle">Consolidado</span>
        <?php $status = $consolidado->abierto ? 'abierto' : 'cerrado' ?>
        @component('components.tooltip-shape')
            @slot('title', ucfirst($status))
            @slot('color', $config_consolidados['colores'][$status])
        @endcomponent
        @endslot

        @slot('content')
        <b>e</b>
        @endslot
    @endcomponent
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
