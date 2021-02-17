@extends('app')
@section('content')

@component('partials.header-show', [
    'title' => $conductor->nombre,
    'subtitle' => 'Conductor',
    'goback' => route('importacion.index'),
])
@endcomponent

@component('components.card')
    @slot('header_options')
    <form action="{{ route('conductores.show', $conductor) }}" method="get" class="d-flex align-items-center">
        <div>
            <label for="select-ultimas-entradas" class="small text-muted d-none d-md-block me-md-2">Ultimas entradas</label>
        </div>
        <div>
            <select name="ultimas" id="select-ultimas-entradas" class="form-control form-control-sm" onchange="submit()" required>
                @foreach([5,10,25,50,75,100] as $number)
                <option value="{{ $number }}" {{ $ultimas_entradas <> $number ?: 'selected' }}>{{ $number }}</option>
                @endforeach
                <option value="todas" {{ $ultimas_entradas <> 'todas' ?: 'selected' }}>Todas</option>
            </select>
        </div>
    </form>
    @endslot

    @slot('body')
        @component('partials.table-summary-entradas', ['entradas' => $entradas])
        @endcomponent
    @endslot
@endcomponent
@endsection
