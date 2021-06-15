<?php

$settings = (object) [
    'sheets' => config('system.impresion.hojas'),
    'except' => isset($except) && is_array($except) ? $except : [],
    'form_id' => 'form-entradas-printing',
];

?>

<div class="dropdown d-inline-block">
    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="me-1">{!! $svg->printer_fill !!}</span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        @foreach ($settings->sheets as $sheet)  
        @if(! in_array($sheet, $settings->except) )         
        <li>
            <button type="submit" class="dropdown-item" name="hoja" value="{{ $sheet }}" form="{{ $settings->form_id }}">{{ ucfirst($sheet) }}</button>
        </li>
        @endif
        @endforeach
    </ul>
    <form action="{{ route('printing.entradas') }}" method="get" id="{{ $settings->form_id }}"></form>
</div>
