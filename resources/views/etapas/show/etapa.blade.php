<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <span>Etapa</span>
        <span>
            <a href="{{ route('etapas.edit', $etapa) }}" class="btn btn-warning btn-sm">e</a>
        </span>
    </div>
    <div class="card-body">
        <p>
            <span>{{ $etapa->nombre }}</span>
            <br>
            <small class="text-muted">Nombre</small>
        </p>

        <p>
            <span>{{ $etapa->realiza_medicion ? 'Si' : 'No' }}</span>
            <br>
            <small class="text-muted">Realiza medición</small>
        </p>

        <p>
            <span class="text-capitalize">{{ $etapa->unica_medida_peso ?? 'Opcional' }}</span>
            <br>
            <small class="text-muted">Única medida de peso</small>
        </p>

        <p>
            <span class="text-capitalize">{{ $etapa->unica_medida_volumen ?? 'Opcional' }}</span>
            <br>
            <small class="text-muted">Única medida de volúmen</small>
        </p>

        <p>
            <span>{{ $etapa->updater->name }}</span>
            <br>
            <span>{{ $etapa->updated_at }}</span>
            <br>
            <small class="text-muted">Actualización</small>
        </p>
    </div>
</div>
