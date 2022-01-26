<div class="btn-group btn-group-sm" role="group" id="wrapperDropdownActions">
    <button id="buttonDropdownActions" type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <span>{!! $graffiti->design('list')->svg() !!}</span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="buttonDropdownActions">
        <li>
            <a class="dropdown-item" href="<?= $component->route('create') ?>">
                <span>{!! $graffiti->design('plus-lg')->svg() !!}</span>
                <span class="align-middle ms-1">Nueva</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="#update">
                <span>{!! $graffiti->design('arrow-clockwise')->svg() !!}</span>
                <span class="align-middle ms-1">Actualizar</span>
            </a>
        </li>
        <li>
            @include('entradas.components.index.modal-delete')
        </li>
    </ul>
</div>
