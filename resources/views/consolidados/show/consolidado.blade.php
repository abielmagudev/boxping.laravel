<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span>Consolidado </span>
            </div>
            <div>
                <a href="{{ route('consolidados.edit', $consolidado->id) }}" class="btn btn-warning btn-sm">Editar</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <p class="text-center">
            @component('components.consolidado-cerrado-badge')
                @slot('closed', $consolidado->cerrado)
                @slot('expanded', true)
            @endcomponent
        </p>
        <div class="table-responsive">
            <table class="table table-borderless table-sm">
                <tbody>
                    <tr>
                        <td style="width:1%">
                            <small class="text-muted">CLIENTE</small>
                        </td>
                        <td>{{ $consolidado->cliente->nombre }}</td>
                    </tr>
                    <tr>
                        <td>
                            <small class="text-muted">NÚMERO</small>
                        </td>
                        <td>{{ $consolidado->numero }}</td>
                    </tr>
                    <tr>
                        <td>
                            <small class="text-muted">TARIMAS</small>
                        </td>
                        <td>
                            <span>{{ $consolidado->tarimas }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <small class="text-muted">NOTAS</small>
                        </td>
                        <td>
                            <p class="text-monospace small">{{ $consolidado->notas }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <small class="text-muted">CREADO</small>
                        </td>
                        <td>{{ $consolidado->created_at }}</td>
                    </tr>
                    <tr>
                        <td>
                            <small class="text-muted">ACTUALIZADO</small>
                        </td>
                        <td>{{ $consolidado->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>