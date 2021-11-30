@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Conductores',
    'counter' => $conductores->count()
])
    @slot('options')
    <a href="{{ route('conductores.create') }}" class="btn btn-sm btn-primary">
        <span class="fw-bold">+</span>
    </a>
    @endslot

    @component('@.bootstrap.table')
        @slot('thead', ['Nombre'])
        @foreach($conductores as $conductor)
        <tr>
            <td>{{ $conductor->nombre }}</td>
            <td class="text-end">
                <a href="{{ route('conductores.show',$conductor) }}" class="btn btn-sm btn-outline-primary">
                    {!! $graffiti->design('eye')->svg() !!}
                </a>
                <a href="{{ route('conductores.edit',$conductor) }}" class="btn btn-sm btn-outline-warning">
                    {!! $graffiti->design('pencil-fill')->svg() !!}
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent
@endcomponent
<br>

@endsection
