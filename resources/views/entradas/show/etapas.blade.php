<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span>Etapas</span>
                <span class="badge badge-primary">{{ $entrada->etapas->count() }}</span>
            </div>
            <div>
                <a href="{{ route('entrada.etapas.create', $entrada) }}" class="btn btn-primary btn-sm">Agregar</a>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        @if( $entrada->etapas->count() )
        <div class="table-responsive">
            <table class="table table-hover small">
                <thead>
                    <tr class="bg-white">
                        <th>Nombre</th>
                        <th>Peso</th>
                        <th>Peso en</th>
                        <th>Ancho</th>
                        <th>Altura</th>
                        <th>Largo</th>
                        <th>Dimensiones en</th>
                        <th>Actualizado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $etapas = $entrada->etapas()->get()->sortBy('id') ?>
                    @foreach($etapas as $etapa)
                    <tr>
                        <td class="align-middle">{{ $etapa->nombre }}</td>

                        @if( $etapa->realizar_medicion )
                        <td class="align-middle">{{ $etapa->pivot->peso }}</td>
                        <td class="align-middle text-capitalize">{{ $etapa->pivot->peso_en }}</td>
                        <td class="align-middle">{{ $etapa->pivot->ancho }}</td>
                        <td class="align-middle">{{ $etapa->pivot->altura }}</td>
                        <td class="align-middle">{{ $etapa->pivot->largo }}</td>
                        <td class="align-middle text-capitalize">{{ $etapa->pivot->dimensiones_en }}</td>

                        @else
                        <td class="align-middle" colspan="6">
                            <p class="text-center p-1 m-0" style="background-color:rgba(0,0,0,0.04)">
                                <b>REGISTRADO</b>   
                            </p>
                        </td>

                        @endif

                        <td class="align-middle text-nowrap">
                            <p class="m-0">{{ $etapa->updater->name }}</p>
                            <p class="m-0">{{ $etapa->pivot->updated_at }}</p>
                        </td>
                        <td class="align-middle text-nowrap">
                            <a href="{{ route('entrada.etapas.edit', ['entrada' => $entrada, 'etapa' => $etapa]) }}" class="btn btn-warning btn-sm">e</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @else
        <br>
        <p class="text-center text-muted">Sin etapas</p>
        
        @endif
    </div>
</div>
