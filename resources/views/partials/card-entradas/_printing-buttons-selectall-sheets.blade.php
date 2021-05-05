<div class="d-inline-block align-middle">
    <div class="btn-toolbar">
        <div class="btn-group btn-group-sm" role="group" aria-label="Options">
            <button type="button" class="btn btn-outline-primary" id="{{ $card->button_selectall_id }}" data-selected="0">{!! $icons->checked_ui !!}</button>
            <div class="btn-group btn-group-sm" role="group">
                <button type="button" class="btn btn-outline-primary dropdown-toggle" id="{{ $card->button_dropdown_sheets_id }}" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="">{!! $icons->printer_fill !!}</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="{{ $card->button_dropdown_sheets_id }}">
                    <li><small class="dropdown-header small">Hojas de impresión</small></li>
                    <li>
                        <button type="submit" class="dropdown-item" form="{{ $card->printing_form_id }}">Informacion</button>
                    </li>
                    @foreach ($card->printing_sheets as $sheet)
                    <li>
                        <button type="submit" class="dropdown-item" name="hoja" value="{{ $sheet }}" form="{{ $card->printing_form_id }}">{{ ucfirst($sheet) }}</button>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <form action="{{ $card->route_printing }}" method="get" id="{{ $card->printing_form_id }}"></form>
</div>
