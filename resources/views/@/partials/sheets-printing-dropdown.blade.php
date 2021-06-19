<?php

$sheets_printing = config('system.impresion.hojas');
$sheets_except = isset($except) && is_array($except) ? $except : [];
$sheets = array_diff($sheets_printing, $sheets_except);
$form_printing_id = 'formEntradasPrinting';

?>

<div class="dropdown d-inline-block">
    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownSheetsPrinting" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="me-1">{!! $svg->printer_fill !!}</span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownSheetsPrinting">
        @foreach ($sheets as $sheet)  
        <li>
            <button type="submit" class="dropdown-item" name="hoja" value="{{ $sheet }}" form="{{ $form_printing_id }}">{{ ucfirst($sheet) }}</button>
        </li>
        @endforeach
    </ul>
    <form action="{{ route('printing.entradas') }}" method="get" id="{{ $form_printing_id }}"></form>
</div>
