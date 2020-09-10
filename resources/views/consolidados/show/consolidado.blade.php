<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span>Consolidado </span>
            </div>
            <div>
                @include('consolidados.includes.cerrado-badge')
                <a href="{{ route('consolidados.edit', $consolidado->id) }}" class="btn btn-warning btn-sm">e</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless table-sm">
                <tbody>
                    <tr>
                        <td style="width:1%">
                            <small class="text-muted">Cliente</small>
                        </td>
                        <td>{{ $consolidado->cliente->nombre }}</td>
                    </tr>
                    <tr>
                        <td>
                            <small class="text-muted">Número</small>
                        </td>
                        <td>{{ $consolidado->numero }}</td>
                    </tr>
                    <tr>
                        <td>
                            <small class="text-muted">Tarimas</small>
                        </td>
                        <td>
                            <span>{{ $consolidado->tarimas }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <small class="text-muted">Notas</small>
                        </td>
                        <td>
                            <p class="text-monospace small">{{ $consolidado->notas }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <small class="text-muted">Creado</small>
                        </td>
                        <td>
                            <p class="m-0">{{ $consolidado->creator->name }}</p>
                            <p class="m-0">{{ $consolidado->created_at }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <small class="text-muted">Actualizado</small>
                        </td>
                        <td>
                            <p class="m-0">{{ $consolidado->updater->name }}</p>
                            <p class="m-0">{{ $consolidado->updated_at }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>