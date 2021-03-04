@extends('app')
@section('content')

@component('components.header', [
    'title' => $vehiculo->alias,
    'subtitle' => 'Vehículo',
    'goback' => route('vehiculos.index'),
])
@endcomponent

<div class="row">
    <div class="col-sm">
        @component('components.card')
            @slot('classes', 'h-100')
            @slot('body_classes', 'd-flex align-items-center justify-content-center')
            @slot('body')
            <div class="text-center">
                <p class="m-0">ENTRADAS</p>
                <a class="display-4 text-decoration-none m-0" href="#!">{{ $entradas->count() }}</a>
            </div>
            @endslot
        @endcomponent
    </div>

    <div class="col-sm">
        @component('components.card')
            @slot('classes', 'h-100')
            @slot('body')
                @component('components.table', [
                        'border' => 'less',
                        'hover' => false,
                        'size'   => 'small',
                        'classes' => 'm-0'
                    ])
                    @slot('thead', ['Conductores', 'Entradas'])
                    @slot('tbody')
                    @foreach($conductores as $id => $conductor)
                    <tr>
                        <td>{{ $conductor['nombre'] }}</td>
                        <td>{{ $conductor['cruces'] }}</td>
                    </tr>
                    @endforeach
                    @endslot
                @endcomponent
            @endslot
        @endcomponent
    </div>
</div>
<br>

@component('components.card', [
    'header_title' => 'Últimas entradas',
])
    @slot('body')
        @component('partials.table-summary-entradas', ['entradas' => $entradas])
        @endcomponent  
    @endslot
@endcomponent

@endsection
