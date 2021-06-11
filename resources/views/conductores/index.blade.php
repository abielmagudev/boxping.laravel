@extends('app')
@section('content')

@component('@.subnavs.importacion')
    @slot('active', 1)
@endcomponent

@component('components.card')
    @slot('header_title', 'Conductores')
    @slot('header_title_badge', $conductores->count())
    @slot('header_options')
    <a href="{{ route('conductores.create') }}" class="btn btn-sm btn-outline-primary">Nuevo conductor</a>
    @endslot
    
    @slot('body')
    @component('components.table')
        @slot('hover', true)
        @slot('thead', ['Nombre',''])
        @slot('tbody')
            @foreach($conductores as $conductor)
            <tr>
                <td>{{ $conductor->nombre }}</td>
                <td class="text-end">
                    <a href="{{ route('conductores.show',$conductor) }}" class="btn btn-sm btn-primary">
                        @component('components.icon', ['icon' => 'eye'])
                        @endcomponent
                    </a>
                    <a href="{{ route('conductores.edit',$conductor) }}" class="btn btn-sm btn-warning">
                        @component('components.icon', ['icon' => 'pencil'])
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
