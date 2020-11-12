<div class="card">
    <div class="card-header">
        <span><b>{{ $entradas_take }}</b> últimas entradas</span>
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
                    <?php $ultimas_entradas = $entradas->take( $entradas_take ) ?>
                    @foreach($ultimas_entradas as $entrada)
                    <tr>
                        <td class="align-middle">
                            <a href="{{ route('entradas.show', $entrada) }}">{{ $entrada->numero }}</a>
                        </td>
                        <td class="align-middle">
                            @if( is_object($entrada->destinatario) )
                            <span>{{ $entrada->destinatario->direccion }}, C.P. {{ $entrada->destinatario->codigo_postal }} <br> {{ $entrada->destinatario->localidad }}</span>
                            
                            @else
                            <small class='text-muted'>PENDIENTE</small>
                            
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
