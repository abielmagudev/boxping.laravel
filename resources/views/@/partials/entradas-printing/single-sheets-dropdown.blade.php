<div class="d-inline dropdown">
    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuPrint" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="d-inline-block d-md-none me-1">{!! $svg->printer_fill !!}</span>
        <span class="d-none d-md-inline-block me-1">Imprimir</span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuPrint">
        @foreach ($printing_sheets as $sheet)
        <li>
            <a class="dropdown-item" href="{{ route('entradas.printing',[$entrada,'hoja' => $sheet]) }}">{{ ucfirst($sheet) }}</a>
        </li>
        @endforeach
    </ul>
</div>
