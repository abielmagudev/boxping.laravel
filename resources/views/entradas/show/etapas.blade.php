<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span>Etapas</span>
                <span class="badge badge-primary">{{ $entrada->etapas->count() }}</span>
            </div>
            <div>
                <a href="{{ route('entrada.etapas.create', $entrada) }}" class="btn btn-primary btn-sm">
                    <b>+</b>
                </a>
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
                        <th>Medida</th>
                        <th>Ancho</th>
                        <th>Altura</th>
                        <th>Largo</th>
                        <th>Medida</th>
                        <th>Zona</th>
                        <th>Alertas</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($entrada->etapas as $etapa)
                    <tr>
                        <td class="align-middle">{{ $etapa->nombre }}</td>

                        @if( $etapa->realiza_medicion && $etapa->pivot->peso )
                        <td class="align-middle">{{ $etapa->pivot->peso }}</td>
                        <td class="align-middle text-capitalize">{{ $etapa->pivot->medida_peso }}</td>
                        <td class="align-middle">{{ $etapa->pivot->ancho }}</td>
                        <td class="align-middle">{{ $etapa->pivot->altura }}</td>
                        <td class="align-middle">{{ $etapa->pivot->largo }}</td>
                        <td class="align-middle text-capitalize">{{ $etapa->pivot->medida_volumen }}</td>

                        @else
                        <td class="align-middle" colspan="6">
                            <p class="text-center p-1 m-0" style="background-color:rgba(0,0,0,0.04)">
                                <b>REGISTRADO</b>   
                            </p>
                        </td>

                        @endif
                        <td class="align-middle">
                            @if( $etapa->pivot->zona )
                            <span>{{ $etapa->pivot->zona->nombre }}</span>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                        @if( $etapa_alertas = $etapa->pivot->alertas() )
                            @foreach($etapa_alertas as $alerta)
                                @component('components.tooltip-shape')
                                    @slot('title', $alerta->nombre)
                                    @slot('color', $config_alertas[$alerta->nivel]['color'])
                                @endcomponent
                            @endforeach
                        @endif
                        </td>
                        <td class="align-middle text-right">
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
