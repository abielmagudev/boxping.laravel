@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Alertas',
    'counter' => $alertas->count(),
])

    @slot('center')
        @foreach($all_niveles as $nivel => $attrs)        
        <span class="badge" style="background-color:<?= $attrs['color'] ?>">{{ $alertas->where('nivel', $nivel)->count() }} {{ ucfirst($nivel) }}</span>
        @endforeach
    @endslot

    @slot('options')
        <a href="{{ route('alertas.create') }}" class="btn btn-sm btn-primary">
            <span class="fw-bold">+</span>
        </a>
    @endslot

    @component('@.bootstrap.table')
        @slot('thead', ['Nivel','Nombre'])
        @foreach($alertas as $alerta)
        <tr>
            <td class="text-center" style="width:1%">
                <span style="color:<?= $alerta->color ?>">{!! $symbols->circle !!}</span>
            </td>
            <td class="text-nowrap">{{ $alerta->nombre }}</td>
            <td class="text-end">
                <a href="{{ route('alertas.edit', $alerta) }}" class="btn btn-sm btn-outline-warning">
                    {!! $svg->pencil !!}
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent
@endcomponent
<br>

@endsection
