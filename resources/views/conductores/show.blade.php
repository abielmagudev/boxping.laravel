@extends('app')
@section('content')

@component('components.card')
    @slot('header_title')
    <small class="d-block small">Conductor</small>
    <span class="">{{ $conductor->nombre }}</span>
    @endslot

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
        @component('components.table')
            @slot('hover', true)
            @slot('thead', ['Número','Destinatario',''])
            @slot('tbody')
            @foreach($entradas as $entrada)
            <tr>
                <td style="min-width:288px">{{ $entrada->numero }}</td>
                <td style="min-width:288px">
                    @if( $entrada->destinatario )
                    <span class="d-block">{{ $entrada->destinatario->direccion ?? '' }}</span>
                    <small>{{ $entrada->destinatario->localidad }}</small>

                    @else
                    <small class="text-muted">Pendiente</small>

                    @endif
                </td>
                <td class='text-end'>
                    <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-sm btn-primary">
                        @component('components.icon', ['icon' => 'eye'])
                        @endcomponent
                    </a>
                </td>
            </tr>
            @endforeach
            @endslot
        @endcomponent
    @endslot
@endcomponent
@endsection
