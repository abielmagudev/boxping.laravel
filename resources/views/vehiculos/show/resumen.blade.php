<div class="row">
    <div class="col-sm">
        <div class="card h-100">
            <div class="card-body text-center">
                <p class="small">CRUCES</p>
                <p class="display-4 m-0">{{ $entradas->count() }}</p>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card h-100">
            <div class="card-body">
                <table class="table table-borderless table-sm small m-0">
                    <thead>
                        <tr>
                            <th>Conductor</th>
                            <th>Cruces</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($conductores as $id => $conductor)
                        <tr>
                            <td>{{ $conductor['nombre'] }}</td>
                            <td>{{ $conductor['cruces'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header">
        <b class="align-middle">{{ $entradas_take }}</b>
        <span class="align-middle">últimas entradas</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="small">
                    <tr>
                        <th>Número</th>
                        <th>Destinatario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($entradas->take( $entradas_take ) as $entrada)
                    <tr>
                        <td class="align-middle">
                            <a href="{{ route('entradas.show', $entrada) }}">{{ $entrada->numero }}</a>
                        </td>
                        <td class="align-middle">
                            @if( $entrada->destinatario )
                            <span>{{ $entrada->destinatario->direccion ?? '' }}</span>
                            <br>
                            <span>{{ $entrada->destinatario->localidad }}</span>

                            @else
                            <small class="text-muted">Sin destinatario</small>

                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
