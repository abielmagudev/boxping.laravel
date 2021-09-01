<div class="dropdown d-inline-block">
    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownEntradasPrinting" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="me-1">{!! $svg->printer_fill !!}</span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownEntradasPrinting">
        @foreach ($guias_impresion as $guia)  
        <li>
            <button type="submit" class="dropdown-item" form="formEntradasPrinting" name="guia" value="{{ $guia->id }}">{{ $guia->nombre }}</button>
        </li>
        @endforeach
    </ul>
    <form action="{{ route('entradas.imprimir.multiple') }}" method="get" id="formEntradasPrinting"></form>
</div>
