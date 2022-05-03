@extends('app')
@section('content')

@include('@.bootstrap.page-header', [
    'pretitle' => 'Transportadora',
    'title' => $transportadora->nombre,
])

<div class="row">

    <!-- Information -->
    <div class="col-sm col-sm-3">
        @component('@.bootstrap.card', [
            'title' => 'Información',    
        ])  
            <p>
                <small class="d-block text-muted">Teléfono</small>
                <span>{{ $transportadora->telefono }}</span>
            </p>
            <p class="text-wrap">
                <small class="d-block text-muted">Sitio web</small>
                @if( $transportadora->hasWeb() )
                <a href="{{ $transportadora->web }}" target="_blank" class="small link-primary">{{ $transportadora->web }}</a>
                @endif
            </p>
            <p class="text-wrap">
                <small class="d-block text-muted">Notas</small>
                <span>{{ $transportadora->notas }}</span>
            </p>
        @endcomponent   
    </div>

    <!-- Salidas -->
    <div class="col-sm col-sm-9">
        @include('salidas.index.card', [
            'settings' => [
                'except' => ['transportadora', 'edit'],
            ],
        ])
    </div>

</div>
<!-- End row -->
<br>

@include('salidas.index.pagination')

@endsection
