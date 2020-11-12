<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span>Entradas</span>
                <span class="badge badge-primary">{{ $consolidado->entradas->count() }}</span>
            </div>
            <div>
                <a href="#!" class="btn btn-primary btn-sm">
                    @component('components.symbol')
                        @slot('symbol', 'print')
                    @endcomponent
                </a>
                
                @if( $consolidado->abierto )
                <a href="{{ route('entradas.create', ['consolidado' => $consolidado]) }}" class="btn btn-primary btn-sm">
                    <b>+</b>
                </a>
                @endif
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        @if( $consolidado->entradas->count() )
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="small">
                        <th>Número</th>
                        <th>Destinatario</th>
                        <th>Salida</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consolidado->entradas->sortByDesc('id') as $entrada)
                    <tr>
                        <td class="align-middle text-nowrap">
                            <a href="{{ route('entradas.show', $entrada) }}">{{ $entrada->numero }}</a>
                        </td>
                        <td class="align-middle">
                            @if( $entrada->destinatario )
                            {{ $entrada->destinatario->localidad }}
                            @endif
                        </td>
                        <td class="align-middle">
                            @if( $salida = false )
                            <span>Numero de sálida</span>
                            @endif
                        </td>
                        <td class="align-middle">
                            @if( $salida_status = false )
                            <span>Numero de sálida</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @else
        <br>
        <p class="text-center text-muted">Sin entradas</p>

        @endif
    </div>
</div>