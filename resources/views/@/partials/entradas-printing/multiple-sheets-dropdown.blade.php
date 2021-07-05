<div class="dropdown d-inline-block">
    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownEntradasPrinting" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="me-1">{!! $svg->printer_fill !!}</span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownEntradasPrinting">
        @foreach ($printing_sheets as $sheet)  
        <li>
            <button type="button" class="dropdown-item" form="formEntradasPrinting" name="hoja" value="{{ $sheet }}">{{ ucfirst($sheet) }}</button>
        </li>
        @endforeach
    </ul>
    <form action="{{ route('entradas.printing.multiple') }}" method="get" id="formEntradasPrinting"></form>
</div>
