<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span>Medidas</span>
            </div>
            <div>
                <a href="{{ route('medidas.create', ['entrada' => $entrada]) }}" class="btn btn-success btn-sm">Agregar</a>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover small">
                <thead>
                    <tr class="bg-white">
                        <th>Medidor</th>
                        <th>Peso</th>
                        <th>Pesaje</th>
                        <th>Ancho</th>
                        <th>Altura</th>
                        <th>Profundidad</th>
                        <th>Vólumen</th>
                        <th>Actualizado</th>
                        <th>Usuario</th>
                        <th></th>
                    </tr>
                </thead>
                @if( $entrada->medidas->count() )
                <tbody>
                    @foreach($entrada->medidas as $medida)
                    <tr>
                        <td class="align-middle">{{ $medida->medidor->nombre }}</td>
                        <td class="align-middle">{{ $medida->peso }}</td>
                        <td class="align-middle">{{ $medida->pesaje }}</td>
                        <td class="align-middle">{{ $medida->ancho }}</td>
                        <td class="align-middle">{{ $medida->altura }}</td>
                        <td class="align-middle">{{ $medida->profundidad }}</td>
                        <td class="align-middle">{{ $medida->volumen }}</td>
                        <td class="align-middle text-nowrap">{{ $medida->updated_at }}</td>
                        <td class="align-middle text-nowrap">{{ $medida->updater->name }}</td>
                        <td class="align-middle text-nowrap">
                            <a href="{{ route('medidas.edit', $medida) }}" class="btn btn-warning btn-sm">e</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
        </div>
    </div>
</div>
