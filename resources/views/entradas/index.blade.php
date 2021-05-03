@extends('app')
@section('content')

<div class="text-end">
    <form action="{{ route('printing.entradas') }}" method="get" id="form-print-list"></form>
    <div class="dropdown">
        <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownPrintMenu" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="me-1">Imprimir</span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownPrintMenu">
            <li><b class="dropdown-header">Hojas disponibles:</b></li>
            <li><button class="dropdown-item" type="submit" form="form-print-list">Informacion</button></li>
            <li><button class="dropdown-item" type="submit" name="hoja" value="etiqueta" form="form-print-list">Etiquetas</button></li>
            <li><button class="dropdown-item" type="submit" name="hoja" value="etapas" form="form-print-list">Etapas</button></li>
        </ul>
    </div>
</div>
<br>

@component('components.card')
    @slot('header_title', 'Entradas')
    @slot('header_title_badge', $entradas->total())
    @slot('header_options')
    <a href="{{ route('entradas.create') }}" class="btn btn-sm btn-outline-primary">
        <span>Nueva entrada</span>
    </a>
    @endslot
    @slot('body')
    @component('components.table')
        @slot('thead', ['','Número','Consolidado','Cliente','Destinatario'])
        @slot('tbody')
        @foreach($entradas as $entrada)
        <?php $checkbox_id = "checkbox-print-list-{$entrada->id}" ?>
        <tr>
            <td style="width:1%">
                <input type="checkbox" name="lista[]" value="{{ $entrada->id }}" id="{{ $checkbox_id }}" class="form-check-input" form="form-print-list">
            </td>
            <td>
                <label for="{{ $checkbox_id }}">{{ $entrada->numero }}</label>
            </td>
            <td>
                @if( $entrada->consolidado )
                <span>{{ $entrada->consolidado->numero }}</span>

                @else
                <span class="text-muted small text-uppercase">Sin consolidar</span>

                @endif
            </td>
            <td>{{ $entrada->cliente->alias }}</td>
            <td>{{ $entrada->destinatario_id ? 'Si' : 'No' }}</td>
            <td class="text-end">
                <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-sm btn-primary">
                    {!! $icons->eye !!}
                </a>
            </td>
        </tr>
        @endforeach
        @endslot
    @endcomponent
    @endslot
@endcomponent

@component('components.pagination-simple')
    @slot('collection', $entradas)
@endcomponent
<br>

@endsection
