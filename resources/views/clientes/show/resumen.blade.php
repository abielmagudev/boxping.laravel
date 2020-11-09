<div class="card-deck">
    <div class="card">
        <div class="card-body text-center">
            <p class="lead">Consolidados</p>
            <p class="display-4 m-0">{{ $cliente->consolidados->count() }}</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body text-center">
            <p class="lead">Entradas</p>
            <p class="display-4 m-0">{{ $entradas->count() }}</p>
        </div>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <div>Últimas entradas</div>
        <div>
            <a href="#!" class="btn btn-primary btn-sm">All</a>
        </div>
    </div>
    <div class="card-body p-0">
        @if( $entradas->count() )
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="small">
                    <tr>
                        <th>Número</th>
                        <th>Destinatario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $last_entradas = $entradas->take(7) ?>
                    @foreach($last_entradas as $entrada)
                    <tr>
                        <td class="align-middle">
                            <a href="{{ route('entradas.show', $entrada) }}">{{ $entrada->numero }}</a>
                        </td>
                        <td class="align-middle">
                            @if( is_object($entrada->destinatario) )
                            <span>{{ $entrada->destinatario->direccion }}, C.P. {{ $entrada->destinatario->codigo_postal }} <br> {{ $entrada->destinatario->localidad }}</span>
                            @else
                            <span class='text-muted'>...</span>
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
