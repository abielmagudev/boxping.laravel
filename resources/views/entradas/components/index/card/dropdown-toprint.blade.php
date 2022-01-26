<div class="btn-group btn-group-sm" role="group" id="wrapperDropdownImprimirMultiple">
    <button id="buttonDropdownImprimirMultiple" type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <span>{!! $graffiti->design('printer')->svg() !!}</span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownImprimirMultiple">
        <li>
            <button type="button" class="dropdown-item" data-entradas-form-action="<?= route('entradas.imprimir.multiple') ?>">Información</button>
        </li>

        @if( $guias_impresion->count() )
        <li>
            <hr class="dropdown-divider">
            <h6 class="dropdown-header">Guías de impresión</h6>
        </li>

        @foreach($guias_impresion as $guia)
        <li>
            <button type="button" class="dropdown-item" data-entradas-form-action="<?= route('entradas.imprimir.multiple', $guia) ?>">{{ $guia->nombre }}</button>
        </li>
        @endforeach

        @endif
    </ul>
</div>
