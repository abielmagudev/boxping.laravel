@extends('app')
@section('content')

@component('partials.header-show', [
    'title' => $vehiculo->alias,
    'subtitle' => 'Vehículo',
    'goback' => route('importacion.index'),
])
@endcomponent

<div class="row">
    <div class="col-sm">
        @component('components.card')
            @slot('classes', 'h-100')
            @slot('body_classes', 'd-flex align-items-center justify-content-center')
            @slot('body')
            <div class="text-center">
                <p class="small m-0">ENTRADAS</p>
                <p class="display-4 m-0">{{ $entradas->count() }}</p>
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

@component('components.card')
    @slot('body')
        @component('partials.table-summary-entradas', ['entradas' => $entradas])
        @endcomponent  
    @endslot
@endcomponent

@endsection
