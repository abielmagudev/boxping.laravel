<div class="d-inline-block align-middle">
    <div class="btn-toolbar">
        <div class="btn-group btn-group-sm" role="group" aria-label="Options">
            <button type="button" class="btn btn-outline-primary" id="{{ $settings->identifiers->button_select_all }}" data-selected="0">{!! $icons->checked_ui !!}</button>
            <div class="btn-group btn-group-sm" role="group">
                <button type="button" class="btn btn-outline-primary dropdown-toggle" id="{{ $settings->identifiers->button_dropdown_sheets }}" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="">{!! $icons->printer_fill !!}</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="{{ $settings->identifiers->button_dropdown_sheets }}">
                    <li><small class="dropdown-header small">Hojas de impresión</small></li>
                    <li>
                        <button type="submit" class="dropdown-item" form="{{ $settings->identifiers->form_printing }}">Informacion</button>
                    </li>
                    @foreach ($settings->hojas as $hoja)
                    <li>
                        <button type="submit" class="dropdown-item" name="hoja" value="{{ $hoja }}" form="{{ $settings->identifiers->form_printing }}">{{ ucfirst($hoja) }}</button>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <form action="{{ route('printing.entradas') }}" method="get" id="{{ $settings->identifiers->form_printing }}"></form>
</div>
