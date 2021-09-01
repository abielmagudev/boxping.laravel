<div class="dropdown d-inline-block">
    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuPrintEntrada" data-bs-toggle="dropdown" aria-expanded="false">
        <span>Imprimir</span>
    </button>
    @if( $guias_impresion->count() )            
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuPrintEntrada">
        @foreach ($guias_impresion as $guia)
        <li><a class="dropdown-item" href="{{ route('entradas.imprimir', [$entrada, $guia]) }}">{{ $guia->nombre }}</a></li>
        @endforeach
    </ul>
    @endif
</div>
