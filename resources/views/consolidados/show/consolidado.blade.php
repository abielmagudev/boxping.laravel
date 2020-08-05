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
            @include('consolidados.includes.cerrado-badge')
        </p>
        <div class="table-responsive">
            <table class="table table-borderless table-sm small">
                <tbody>
                    <tr>
                        <td style="width:1%">Cliente</td>
                        <td>{{ $consolidado->cliente->nombre }}</td>
                    </tr>
                    <tr>
                        <td>Número</td>
                        <td>{{ $consolidado->numero }}</td>
                    </tr>
                    <tr>
                        <td>Tarimas</td>
                        <td>
                            <span>{{ $consolidado->tarimas }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Notas</td>
                        <td>
                            <p class="text-monospace small">{{ $consolidado->notas }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Creado</td>
                        <td>
                            <p class="m-0">{{ $consolidado->created_at }}</p>
                            <p class="m-0">{{ $consolidado->creado->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Actualizado</td>
                        <td>
                            <p class="m-0">{{ $consolidado->updated_at }}</p>
                            <p class="m-0">{{ $consolidado->actualizado->name }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>