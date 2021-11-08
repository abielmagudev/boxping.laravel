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
                <span class="">{{ $transportadora->web }}</span>
                <span class="d-block text-end mt-2">
                    <a href="{{ $transportadora->web }}" target="_blank" class="small link-primary">Ver sitio web</a>
                </span>
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
        @component('@.bootstrap.card', [
            'title' => 'Salidas recientes',    
        ])
            @include('@.partials.table-salidas.content', [
                'salidas' => $salidas,
                'edit' => false,
            ])
        @endcomponent
    </div>

</div>
<!-- End row -->
<br>

@endsection
