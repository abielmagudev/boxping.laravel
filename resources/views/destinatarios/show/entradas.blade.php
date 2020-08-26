<div class="card">
    <div class="card-header py-3">
        <span>Entradas</span>
        <span class="badge badge-primary">{{ $entradas->count() }}</span>
    </div>
    <div class="card-body p-0">
        @if( $entradas->count() )
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="small">
                        <th>Número</th>
                        <th>Consolidado</th>
                        <th>Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($entradas as $entrada)
                    <tr>
                        <td>
                            <a href="{{ route('entradas.show', $entrada) }}">{{ $entrada->numero }}</a>
                        </td>
                        <td>
                            @if( is_object($entrada->consolidado) )
                            <span>{{ $entrada->consolidado->numero }}</span>
                            @endif
                        </td>
                        <td>
                            <span>{{ $entrada->cliente->nombre }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @else
        <br>
        <p class="text-center text-muted text-uppercase">Sin entradas</p>
        
        @endif
    </div>
</div>