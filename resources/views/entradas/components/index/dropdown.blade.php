<div class="dropdown ms-1">
    <button class="btn border-0 dropdown-toggle-arrowless" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        {!! $graffiti->design('three-dots-vertical')->svg() !!}
    </button>
    <ul class="dropdown-menu border-0 shadow" aria-labelledby="dropdownMenuButton1">
        <li>
            <a href="{{ route('entradas.create') }}" class="dropdown-item">
                <span>{!! $graffiti->design('plus-lg')->svg() !!}</span>
                <span class="align-middle">Nueva</span>
            </a>
        </li>
        <li>
            @include('entradas.components.modal-filter.trigger', [
                'classes' => 'dropdown-item',
                'text' => $graffiti->design('funnel')->svg() . "<span class='align-middle'>Filtrar</span>",
            ])
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <span class="dropdown-header text-muted" style="font-size:0.8rem">Seleccionadas...</span>
        </li>
        <li>
            <a class="dropdown-item" href="#">
                <span>{!! $graffiti->design('printer')->svg() !!}</span>
                <span class="align-middle">Imprimir</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="#">
                <span>{!! $graffiti->design('trash')->svg() !!}</span>
                <span class="align-middle">Eliminar</span>
            </a>
        </li>
    </ul>
</div>