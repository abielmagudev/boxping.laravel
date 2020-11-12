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
                            <span class="text-muted">Sin destinatario</span>

                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
