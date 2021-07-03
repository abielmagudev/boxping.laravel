<?php

$sheets_printing = config('system.impresion.hojas');
$sheets_except = isset($except) && is_array($except) ? $except : [];
$sheets_only = array_diff($sheets_printing, $sheets_except);

?>

<div class="dropdown d-inline-block">
    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownTemplatesPrinting" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="me-1">{!! $svg->printer_fill !!}</span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownTemplatesPrinting">
        @foreach ($sheets_only as $sheet)  
        <li>
            <button type="button" class="dropdown-item" form="formEntradasPrinting" name="hoja" value="{{ $sheet }}">{{ ucfirst($sheet) }}</button>
        </li>
        @endforeach
    </ul>
    <form action="{{ route('entradas.printing.multiple') }}" method="get" id="formEntradasPrinting"></form>
</div>

<script>

let buttonsPrinting = document.querySelectorAll('button[form="formEntradasPrinting"]'); 
let formPrinting = document.getElementById('formEntradasPrinting');
let actionForm = formPrinting.action;

buttonsPrinting.forEach( function (item, index) {
    item.addEventListener('click', function (e) {
        formPrinting.action = actionForm + "/" + item.value;
        formPrinting.submit();
    })
});

</script>
