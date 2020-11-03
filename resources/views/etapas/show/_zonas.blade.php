<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <div>
            <span>Zonas</span>
            <span class="badge badge-primary">{{ $etapa->zonas->count() }}</span>
        </div>
        <div>
            <a href="{{ route('zonas.create', $etapa) }}" class="btn btn-primary btn-sm">
                <b>+</b>
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        @if( $etapa->zonas->count() )
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="small">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($etapa->zonas->sortByDesc('id') as $zona)
                    <tr>
                        <td class="align-middle">{{ $zona->nombre }}</td>
                        <td class="align-middle">{{ $zona->descripcion }}</td>
                        <td class="align-middle text-right">
                            <a href="{{ route('zonas.edit', [$etapa, $zona]) }}" class="btn btn-warning btn-sm">e</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @else
        <br>
        <p class="text-center text-muted">Sin zonas</p>

        @endif
    </div>
</div>
