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
            <b>+</b>
        </a>
    @endslot

    @component('@.bootstrap.table', [
        'thead' => ['Nivel','Nombre','Descripción']
    ])
        @foreach($alertas as $alerta)
        <tr>
            <td class="text-center" style="width:1%">
                {!! $graffiti->design('circle-fill', ['style' => "color:{$alerta->color}"])->svg() !!}
            </td>
            <td class="text-nowrap">{{ $alerta->nombre }}</td>
            <td>{{ $alerta->descripcion }}</td>
            <td class="text-end">
                <a href="{{ route('alertas.edit', $alerta) }}" class="btn btn-sm btn-outline-warning">
                    {!! $graffiti->design('pencil-fill')->svg() !!}
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent
@endcomponent
<br>

@endsection
